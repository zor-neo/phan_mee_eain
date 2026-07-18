@extends('auther.layout.master')
@section('container')
    <main class="mt-4 main-content d-flex flex-column min-vh-100 w-100">
        <div class="container-lg">
            <form action="{{ route('editContent#Process') }}" method="post" enctype="multipart/form-data"
                class="content-editor-form" novalidate>
                @csrf
                <input type="hidden" name="oldImage" value="{{ $content->image }}">
                <input type="hidden" name="userId" value="{{ Auth::user()->id }}">
                <input type="hidden" name="contentId" value="{{ $content->contentId }}">

                <div class="row g-4">
                    <div class="col-lg-4">
                        <div class="sw-panel h-100">
                            <label class="form-label fw-bold">Featured Photo <span class="text-muted">(optional)</span></label>
                            <img class="img-fluid rounded border mb-3 w-100" id="output"
                                src="{{ \App\Support\UploadedMedia::url('content', $content->image, 'content/image/logo.jpg') }}"
                                alt="Preview">
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"
                                accept=".png,.jpg,.jpeg,.webp,.gif,image/png,image/jpeg,image/webp,image/gif"
                                onchange="loadfile(event)">
                            @error('image')
                                <small class="invalid-feedback d-block">{{ $message }}</small>
                            @enderror
                            <p class="small sw-muted mt-3 mb-0">Leave empty to keep the current photo.</p>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="sw-panel">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Title</label>
                                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $content->title) }}" placeholder="Name..." required>
                                    @error('title')
                                        <small class="invalid-feedback d-block">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Category</label>
                                    <select name="category" class="form-select @error('category') is-invalid @enderror" required>
                                        <option value="">Choice category.....</option>
                                        @foreach ($category as $item)
                                            <option value="{{ $item->id }}" @selected(old('category', $content->categoryId) == $item->id)>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                        <small class="invalid-feedback d-block">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="row g-3 mt-1">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Select one object</label>
                                    <div class="d-flex flex-wrap gap-3">
                                        <label class="form-check-label">
                                            <input type="radio" name="object" value="edu" class="form-check-input me-1" @checked(old('object', $content->role) === 'edu') required>
                                            Education
                                        </label>
                                        <label class="form-check-label">
                                            <input type="radio" name="object" value="kno" class="form-check-input me-1" @checked(old('object', $content->role) === 'kno')>
                                            Article
                                        </label>
                                    </div>
                                    @error('object')
                                        <small class="invalid-feedback d-block">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Youtube link <span class="text-danger">optional</span></label>
                                    <input type="url" name="link" class="form-control @error('link') is-invalid @enderror" value="{{ old('link', $content->link) }}" placeholder="link...">
                                    @error('link')
                                        <small class="invalid-feedback d-block">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="mt-3">
                                <label class="form-label fw-bold">Content</label>
                                <textarea name="content" rows="10" class="form-control @error('content') is-invalid @enderror" placeholder="content..." required>{{ old('content', $content->content) }}</textarea>
                                @error('content')
                                    <small class="invalid-feedback d-block">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mt-3">
                                <label class="form-label fw-bold">Add more resources</label>
                                <input type="file" name="resources[]" class="form-control @error('resources') is-invalid @enderror"
                                    accept=".png,.jpg,.jpeg,.webp,.gif,.mp4,.mov,.avi,.mkv,.pdf,.doc,.docx,.ppt,.pptx,.xls,.xlsx,.txt,.zip,image/png,image/jpeg,image/webp,image/gif,video/mp4,video/quicktime,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.ms-powerpoint,application/vnd.openxmlformats-officedocument.presentationml.presentation,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,text/plain,application/zip"
                                    multiple>
                                <small class="invalid-feedback d-block js-file-error"></small>
                                <div class="form-text">You can add more files without removing the existing ones. Total size per upload must stay under 10 MB.</div>
                                @error('resources')
                                    <small class="invalid-feedback d-block">{{ $message }}</small>
                                @enderror
                                @error('resources.*')
                                    <small class="invalid-feedback d-block">{{ $message }}</small>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary mt-4">Save Changes</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
    @push('jq-section')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const form = document.querySelector('.content-editor-form');
                const allowedExtensions = [
                    'png', 'jpg', 'jpeg', 'webp', 'gif', 'mp4', 'mov', 'avi', 'mkv',
                    'pdf', 'doc', 'docx', 'ppt', 'pptx', 'xls', 'xlsx', 'txt', 'zip'
                ];
                const maxTotalBytes = 10 * 1024 * 1024;

                function showInvalid(field, message) {
                    field.classList.add('is-invalid');
                    let feedback = field.parentElement.querySelector('.js-file-error');

                    if (!feedback) {
                        feedback = document.createElement('small');
                        feedback.className = 'invalid-feedback d-block js-file-error';
                        field.insertAdjacentElement('afterend', feedback);
                    }

                    feedback.textContent = message;
                }

                function clearInvalid(field) {
                    field.classList.remove('is-invalid');
                    const feedback = field.parentElement.querySelector('.js-file-error');

                    if (feedback) {
                        feedback.textContent = '';
                    }
                }

                function firstInvalidTarget() {
                    return form.querySelector('.is-invalid, :invalid');
                }

                function focusInvalid() {
                    const target = firstInvalidTarget();

                    if (target) {
                        target.focus({preventScroll: true});
                        target.scrollIntoView({behavior: 'smooth', block: 'center'});
                    }
                }

                function validateFiles(input, maxTotal = null) {
                    clearInvalid(input);

                    if (!input.files.length) {
                        return true;
                    }

                    let total = 0;

                    for (const file of input.files) {
                        total += file.size;
                        const extension = file.name.split('.').pop().toLowerCase();

                        if (!allowedExtensions.includes(extension)) {
                            showInvalid(input, `${file.name} is not an allowed file type.`);
                            return false;
                        }
                    }

                    if (maxTotal && total > maxTotal) {
                        showInvalid(input, 'The total resource size must be 10 MB or less.');
                        return false;
                    }

                    return true;
                }

                if (form) {
                    form.querySelectorAll('input, select, textarea').forEach(function (field) {
                        field.addEventListener('input', function () {
                            if (field.checkValidity()) {
                                clearInvalid(field);
                            }
                        });
                        field.addEventListener('change', function () {
                            if (field.type === 'file') {
                                validateFiles(field, field.name === 'resources[]' ? maxTotalBytes : null);
                                return;
                            }

                            if (field.checkValidity()) {
                                clearInvalid(field);
                            }
                        });
                    });

                    form.addEventListener('submit', function (event) {
                        let canSubmit = true;
                        const imageInput = form.querySelector('input[name="image"]');
                        const resourceInput = form.querySelector('input[name="resources[]"]');

                        form.querySelectorAll('input, select, textarea').forEach(function (field) {
                            if (!field.checkValidity()) {
                                canSubmit = false;
                                showInvalid(field, field.validity.valueMissing ? 'Please complete this field.' : 'Please enter a valid value.');
                            }
                        });

                        if (imageInput && !validateFiles(imageInput)) {
                            canSubmit = false;
                        }

                        if (resourceInput && !validateFiles(resourceInput, maxTotalBytes)) {
                            canSubmit = false;
                        }

                        if (!canSubmit || !form.checkValidity()) {
                            event.preventDefault();
                            event.stopPropagation();
                            focusInvalid();
                        }
                    });
                }

                const firstInvalid = document.querySelector('.is-invalid');
                if (firstInvalid) {
                    firstInvalid.focus({preventScroll: false});
                    firstInvalid.scrollIntoView({behavior: 'smooth', block: 'center'});
                }
            });
        </script>
    @endpush
@endsection
