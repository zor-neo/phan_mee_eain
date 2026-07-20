@extends('user.layout.master')

@section('container')
    <main>
        <section class="sw-section">
            <div class="container-lg">
                <div class="row g-3 align-items-start mb-4">
                    <div class="col-12 col-lg-7 d-flex flex-wrap gap-2">
                        @php
                            $activeFunction = fn($value) => $find == $value ? 'active' : '';
                        @endphp
                        <a href="{{ route('content#Page', ['find' => 'default']) }}"
                            class="btn btn-outline-primary {{ $activeFunction('default') }}">All Contents</a>
                        <a href="{{ route('content#Page', ['find' => 'edu']) }}"
                            class="btn btn-outline-primary {{ $activeFunction('edu') }}">Education</a>
                        <a href="{{ route('content#Page', ['find' => 'kno']) }}"
                            class="btn btn-outline-primary {{ $activeFunction('kno') }}">Knowledge</a>
                        <a href="{{ route('content#Page', ['find' => Auth::id()]) }}"
                            class="btn btn-outline-primary {{ $activeFunction(Auth::id()) }}">Your Saved</a>
                    </div>
                    <div class="col-12 col-lg-5">
                        <form action="{{ route('content#Page') }}" method="get" class="row g-2">
                            <div class="col-8">
                                <input type="text" name="search" class="form-control" placeholder="Search....."
                                    value="{{ request('search') }}">
                            </div>
                            <div class="col-4">
                                <button type="submit" class="btn btn-outline-primary w-100">
                                    <i class="fa-solid fa-magnifying-glass text-primary"></i>
                                </button>
                            </div>
                        </form>
                        <div class="dropdown mt-2">
                            <button class="btn btn-outline-primary dropdown-toggle w-100" type="button"
                                id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                Categories
                            </button>
                            <ul class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton1">
                                @foreach ($category as $item)
                                    <li>
                                        <a class="dropdown-item {{ $activeFunction($item->id) }}"
                                            href="{{ route('content#Page', ['find' => $item->id]) }}">
                                            {{ $item->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <div class="d-flex justify-content-center">
                                <img src="{{ asset('content/image/logo.jpg') }}" alt=""
                                    class="img-fluid" style="max-width: 256px;">
                            </div>
                            <p class="fw-bold fs-4 mt-3 mb-0">Knowledge and Education</p>
                        </div>

                        <div class="d-grid gap-3">
                            @foreach ($latest as $item)
                                @php
                                    $content = $contents[$item->contentId];
                                    $myReact = $content->reacts->firstWhere('user_id', Auth::id());
                                    $myReactType = $myReact->react ?? null;
                                    $isReported = in_array($item->contentId, $activeReportContentIds ?? [], true);
                                    $authorImageUrl = \App\Support\UploadedMedia::url('profile', $item->userImage, 'image/user-male-circle.jpg');
                                    $contentImageUrl = \App\Support\UploadedMedia::url('content', $item->contentImage, 'content/image/default-article-wide.jpg');
                                    $contentText = (string) $item->content;
                                    $contentPreviewLimit = 360;
                                    $hasLongContent = Str::length($contentText) > $contentPreviewLimit;
                                    $contentPreview = $hasLongContent ? Str::limit($contentText, $contentPreviewLimit, '...') : $contentText;
                                @endphp

                                <article class="card text-center">
                                    <div class="card-header">
                                        <div class="row g-2 align-items-center">
                                            <div class="col-12 col-md-6 text-start">
                                                <a href="#" class="text-decoration-none text-dark d-inline-flex align-items-center gap-2">
                                                    <img src="{{ $authorImageUrl }}"
                                                        alt="..." class="rounded-2"
                                                        style="width: 52px; height: 52px; object-fit: cover;">
                                                    <span>{{ $item->userName }}</span>
                                                </a>
                                            </div>
                                            <div class="col-12 col-md-6 text-md-end">
                                                <span class="badge bg-secondary mb-1">
                                                    <i class="fas fa-bars-staggered"></i> {{ $item->categoryName }}
                                                </span>
                                                <span class="badge bg-secondary mb-1">
                                                    <i class="fas fa-bars-staggered"></i>
                                                    {{ $item->role == 'kno' ? 'Article(ဆောင်းပါး)' : 'Education' }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <h5 class="card-title fw-bold fs-5">{{ $item->title }}</h5>
                                        <div class="row g-3 align-items-start">
                                            <div class="col-12 col-lg-5">
                                                <div class="sw-content-image-frame">
                                                    <img class="sw-content-image"
                                                        src="{{ $contentImageUrl }}"
                                                        alt="..." data-bs-toggle="modal" data-bs-target="#imageModal"
                                                        data-full-src="{{ $contentImageUrl }}">
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-7 text-start">
                                                <p class="card-text mb-2 sw-content-copy" data-expandable-content
                                                    style="white-space: pre-line; overflow-wrap: anywhere;">
                                                    <span data-content-preview>{{ $contentPreview }}</span>
                                                    @if ($hasLongContent)
                                                        <span class="d-none" data-content-full>{{ $contentText }}</span>
                                                    @endif
                                                </p>

                                                @if ($hasLongContent)
                                                    <button type="button" class="btn btn-outline-primary btn-sm mb-3"
                                                        data-content-toggle aria-expanded="false">
                                                        See more
                                                    </button>
                                                @endif

                                                @if ($content->link)
                                                    <div class="mb-3">
                                                        <a href="{{ $content->link }}" target="_blank" rel="noopener"
                                                            class="btn btn-sm btn-outline-primary">
                                                            <i class="fa-solid fa-arrow-up-right-from-square me-1"></i>Open
                                                            link
                                                        </a>
                                                    </div>
                                                @endif

                                                @if ($content->resources->count())
                                                    <div class="mt-3">
                                                        <p class="fw-bold mb-2">Resources</p>
                                                        <div class="d-flex flex-wrap gap-2">
                                                            @foreach ($content->resources as $resource)
                                                                <a href="{{ route('contentResource.download', $resource->id) }}"
                                                                    class="btn btn-sm btn-outline-secondary text-break">
                                                                    <i class="fa-solid fa-download me-1"></i>{{ $resource->original_name }}
                                                                </a>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>

                                        <a href="javascript:void(0)"
                                            class="btn btn-outline-primary mt-3 save-btn"
                                            data-user-id="{{ Auth::id() }}"
                                            data-content-id="{{ $item->contentId }}">
                                            <i
                                                class="{{ in_array($item->contentId, $savedContentIds) ? 'fa-solid' : 'fa-regular' }} fa-bookmark"></i>
                                        </a>

                                        <div class="mt-2 mb-1">
                                            <p class="text-muted mb-0">{{ $item->created_at->diffForHumans() }}</p>
                                        </div>
                                    </div>

                                    <div class="card-footer text-body-secondary">
                                        <div class="d-flex flex-column gap-3">
                                            <div class="row g-2 align-items-start">
                                                <div class="col-12 col-lg-7">
                                                    <div class="react-buttons d-flex flex-wrap gap-2"
                                                        data-content-id="{{ $item->contentId }}"
                                                        data-base-url="{{ url('/content/react') }}">
                                                        <button type="button"
                                                            class="btn btn-outline-primary react-btn {{ $myReactType == 0 ? 'active-react' : '' }}"
                                                            data-react="0">
                                                            <i
                                                                class="fa-{{ $myReactType == 0 ? 'solid' : 'regular' }} fa-thumbs-up fs-5"></i>
                                                            <span class="likes-count">{{ $content->likes_count ?? 0 }}</span>
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-outline-primary react-btn {{ $myReactType == 1 ? 'active-react' : '' }}"
                                                            data-react="1">
                                                            <i class="fa-{{ $myReactType == 1 ? 'solid' : 'regular' }} fa-heart fs-5"></i>
                                                            <span class="loves-count">{{ $content->loves_count ?? 0 }}</span>
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-outline-primary react-btn {{ $myReactType == 2 ? 'active-react' : '' }}"
                                                            data-react="2">
                                                            <i
                                                                class="fa-{{ $myReactType == 2 ? 'solid' : 'regular' }} fa-face-frown fs-5"></i>
                                                            <span class="unlikes-count">{{ $content->unlikes_count ?? 0 }}</span>
                                                        </button>
                                                        <button type="button" class="btn btn-outline-primary"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#reactList{{ $item->contentId }}"
                                                            aria-expanded="false">
                                                            <span class="total-count">{{ $content->reacts->count() ?? 0 }}</span>
                                                            reactions
                                                        </button>
                                                    </div>

                                                    <div class="collapse mt-2" id="reactList{{ $item->contentId }}">
                                                        <ul class="list-group react-user-list">
                                                            @forelse ($content->reacts ?? [] as $react)
                                                                <li
                                                                    class="list-group-item d-flex justify-content-between align-items-center">
                                                                    {{ $react->user->name ?? 'Unknown' }}
                                                                    <span>
                                                                        @if ($react->react == 0)
                                                                            <i class="fa-solid fa-thumbs-up text-primary"></i> Like
                                                                        @elseif ($react->react == 1)
                                                                            <i class="fa-solid fa-heart text-danger"></i> Love
                                                                        @else
                                                                            <i class="fa-solid fa-face-frown text-secondary"></i>
                                                                            Un-like
                                                                        @endif
                                                                    </span>
                                                                </li>
                                                            @empty
                                                                <li class="list-group-item text-muted no-react">There is no reaction
                                                                    making</li>
                                                            @endforelse
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="col-6 col-lg-3">
                                                    <p class="d-inline-flex flex-wrap gap-1 align-items-center mb-0">
                                                        <a class="btn btn-outline-primary w-100" data-bs-toggle="collapse"
                                                            href="#commentList{{ $item->contentId }}" role="button"
                                                            aria-expanded="false">
                                                            Comment
                                                        </a>
                                                    </p>
                                                    <span class="comment-count-badge d-inline-block mt-2"
                                                        data-content-id="{{ $item->contentId }}">
                                                        {{ $content->comments_count ?? 0 }} comments
                                                    </span>
                                                </div>

                                                <div class="col-6 col-lg-2">
                                                    <button type="button"
                                                        class="btn btn-outline-primary report-trigger w-100 {{ $isReported ? 'report-locked btn-secondary' : '' }}"
                                                        data-content-id="{{ $item->contentId }}"
                                                        data-reported="{{ $isReported ? '1' : '0' }}">
                                                        {{ $isReported ? 'Reported' : 'Report' }}
                                                    </button>
                                                </div>
                                            </div>

                                            <div class="collapse mt-2" id="commentList{{ $item->contentId }}">
                                                <div class="card card-body">
                                                    <ul class="list-group comment-list mb-2">
                                                        @forelse ($content->comments ?? [] as $comment)
                                                            <li class="list-group-item mb-2 d-flex justify-content-between"
                                                                data-comment-id="{{ $comment->id }}">
                                                                <div class="card border-0 text-start">
                                                                    <strong>{{ $comment->user->name ?? 'Unknown' }}</strong>
                                                                    <p class="mb-0 card-text">{{ $comment->comment }}</p>
                                                                    <small class="text-muted mt-3">{{ $comment->created_at->diffForHumans() }}</small>
                                                                </div>

                                                                @if (Auth::id() == $comment->user_id || Auth::user()->role == 'admin')
                                                                    <button type="button"
                                                                        class="btn btn-sm btn-outline-danger comment-delete-btn ms-3"
                                                                        data-comment-id="{{ $comment->id }}">
                                                                        <i class="fa-solid fa-trash"></i>
                                                                    </button>
                                                                @endif
                                                            </li>
                                                        @empty
                                                            <li class="list-group-item text-muted no-comment">There is no comments</li>
                                                        @endforelse
                                                    </ul>
                                                </div>

                                                <form class="comment-form rounded-2 mt-1"
                                                    data-content-id="{{ $item->contentId }}">
                                                    @csrf
                                                    <div class="row g-2">
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" name="comment"
                                                                class="form-control comment-input"
                                                                placeholder="Write a comment..." autocomplete="off">
                                                        </div>
                                                        <div class="col-12 col-md-3">
                                                            <button type="submit" class="btn btn-outline-primary w-100">
                                                                <i class="fa-solid fa-paper-plane"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="mt-3">
                    {{ $latest->links() }}
                </div>
            </div>
        </section>
    </main>

    <div class="modal fade" id="reportModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form id="reportModalForm">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Report post</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="contentId" id="reportContentId">
                        <label class="form-label fw-bold" for="reportReason">Choose a reason</label>
                        <select name="report" id="reportReason" class="form-select">
                            <option value="Wrong Information">Wrong Information</option>
                            <option value="Outdated Information">Outdated Information</option>
                            <option value="Missing Context">Missing Context</option>
                            <option value="Unclear Explanation">Unclear Explanation</option>
                            <option value="Duplicate Content">Duplicate Content</option>
                            <option value="Harassment or Bullying">Harassment or Bullying</option>
                            <option value="Spam">Spam</option>
                        </select>
                        <p class="small sw-muted mt-3 mb-0" id="reportHelpText">Confirm to submit this report.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Confirm report</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('jq-section')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const userId = {{ Auth::id() }};
            const reportModalElement = document.getElementById('reportModal');
            const reportModal = new bootstrap.Modal(reportModalElement);
            const reportForm = document.getElementById('reportModalForm');
            const reportContentId = document.getElementById('reportContentId');
            const reportReason = document.getElementById('reportReason');
            const reportHelpText = document.getElementById('reportHelpText');
            let activeReportButton = null;

            document.querySelectorAll('[data-content-toggle]').forEach(function(button) {
                button.addEventListener('click', function() {
                    const content = button.previousElementSibling;
                    const preview = content?.querySelector('[data-content-preview]');
                    const full = content?.querySelector('[data-content-full]');

                    if (!preview || !full) {
                        return;
                    }

                    const expanded = button.getAttribute('aria-expanded') === 'true';
                    preview.classList.toggle('d-none', !expanded);
                    full.classList.toggle('d-none', expanded);
                    button.setAttribute('aria-expanded', expanded ? 'false' : 'true');
                    button.textContent = expanded ? 'See more' : 'See less';
                });
            });

            function reactLabel(reactType) {
                if (reactType === 0) {
                    return '<i class="fa-solid fa-thumbs-up text-primary"></i> Like';
                } else if (reactType === 1) {
                    return '<i class="fa-solid fa-heart text-danger"></i> Love';
                }

                return '<i class="fa-solid fa-face-frown text-secondary"></i> Un-like';
            }

            function renderUserList(container, reactList) {
                const listEl = container.parentElement.querySelector('.react-user-list');
                listEl.innerHTML = '';

                if (reactList.length === 0) {
                    listEl.innerHTML =
                        '<li class="list-group-item text-muted no-react">There is no reaction making</li>';
                    return;
                }

                reactList.forEach(function(item) {
                    const li = document.createElement('li');
                    li.className = 'list-group-item d-flex justify-content-between align-items-center';
                    li.innerHTML = `${item.user_name} <span>${reactLabel(item.react)}</span>`;
                    listEl.appendChild(li);
                });
            }

            function updateActiveIcon(container, myReact) {
                container.querySelectorAll('.react-btn').forEach(function(btn) {
                    const icon = btn.querySelector('i');
                    const reactType = parseInt(btn.dataset.react, 10);

                    btn.classList.remove('active-react');
                    icon.classList.remove('fa-solid');
                    icon.classList.add('fa-regular');

                    if (myReact !== null && reactType === myReact) {
                        btn.classList.add('active-react');
                        icon.classList.remove('fa-regular');
                        icon.classList.add('fa-solid');
                    }
                });
            }

            document.querySelectorAll('.react-btn').forEach(function(btn) {
                btn.addEventListener('click', function() {
                    const container = btn.closest('.react-buttons');
                    const contentId = container.dataset.contentId;
                    const baseUrl = container.dataset.baseUrl;
                    const reactType = btn.dataset.react;

                    fetch(`${baseUrl}/${userId}/${contentId}/${reactType}`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            container.querySelector('.likes-count').textContent = data.likes_count;
                            container.querySelector('.loves-count').textContent = data.loves_count;
                            container.querySelector('.unlikes-count').textContent = data.unlikes_count;
                            container.querySelector('.total-count').textContent = data.total_count;

                            renderUserList(container, data.react_list);
                            updateActiveIcon(container, data.my_react);
                        })
                        .catch(error => console.error('Error:', error));
                });
            });

            document.querySelectorAll('.comment-form').forEach(function(form) {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();

                    const contentId = form.dataset.contentId;
                    const input = form.querySelector('.comment-input');
                    const commentText = input.value.trim();

                    if (commentText === '') {
                        return;
                    }

                    fetch("{{ route('comment.Process') }}", {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                            },
                            body: JSON.stringify({
                                userId: userId,
                                contentId: contentId,
                                comment: commentText
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            const listEl = document.querySelector(`#commentList${contentId} .comment-list`);
                            const noComment = listEl.querySelector('.no-comment');

                            if (noComment) {
                                noComment.remove();
                            }

                            const li = document.createElement('li');
                            li.className = 'list-group-item mb-2 d-flex justify-content-between';
                            li.dataset.commentId = data.comment.id;

                            const div = document.createElement('div');
                            div.className = 'card border border-0 text-start';
                            div.dataset.commentId = data.comment.id;

                            const strong = document.createElement('strong');
                            strong.textContent = data.comment.user_name;

                            const p = document.createElement('p');
                            p.className = 'mb-0 card-text';
                            p.textContent = data.comment.comment;

                            const small = document.createElement('small');
                            small.className = 'text-muted mt-3';
                            small.textContent = data.comment.created_at;

                            div.appendChild(strong);
                            div.appendChild(p);
                            div.appendChild(small);
                            li.appendChild(div);

                            if (data.comment.user_id === userId) {
                                const delBtn = document.createElement('button');
                                delBtn.type = 'button';
                                delBtn.className = 'btn btn-sm btn-outline-danger comment-delete-btn ms-3';
                                delBtn.dataset.commentId = data.comment.id;
                                delBtn.innerHTML = '<i class="fa-solid fa-trash"></i>';
                                li.appendChild(delBtn);
                            }

                            listEl.appendChild(li);

                            const badge = document.querySelector(
                                `.comment-count-badge[data-content-id="${contentId}"]`
                            );

                            if (badge) {
                                badge.textContent = `${data.comment_count} comments`;
                            }

                            input.value = '';
                        })
                        .catch(error => console.error('Error:', error));
                });
            });

            document.addEventListener('click', function(e) {
                const deleteButton = e.target.closest('.comment-delete-btn');
                if (!deleteButton) {
                    return;
                }

                if (!confirm('Do you want to delete this comment?')) {
                    return;
                }

                const commentId = deleteButton.dataset.commentId;
                const li = deleteButton.closest('li');
                const commentList = li.closest('.comment-list');
                const collapseContainer = li.closest('.collapse');
                const contentId = collapseContainer.id.replace('commentList', '');

                fetch(`/content/comment/delete/${commentId}`, {
                        method: 'DELETE',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        }
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Delete failed');
                        }

                        return response.json();
                    })
                    .then(data => {
                        li.remove();

                        const badge = document.querySelector(
                            `.comment-count-badge[data-content-id="${contentId}"]`
                        );
                        if (badge) {
                            badge.textContent = `${data.comment_count} comments`;
                        }

                        if (commentList.children.length === 0) {
                            commentList.innerHTML =
                                '<li class="list-group-item text-muted no-comment">There is no comment</li>';
                        }
                    })
                    .catch(error => console.error('Error:', error));
            });

            document.querySelectorAll('.report-trigger').forEach(function(button) {
                button.addEventListener('click', function() {
                    if (button.dataset.reported === '1') {
                        alert('You already reported this post. You may report again after 24 hours.');
                        return;
                    }

                    activeReportButton = button;
                    reportContentId.value = button.dataset.contentId;
                    reportReason.value = 'Spam';
                    reportHelpText.textContent = 'Choose a reason and confirm to submit this report.';
                    reportModal.show();
                });
            });

            reportForm.addEventListener('submit', function(e) {
                e.preventDefault();

                fetch("{{ route('report.Process') }}", {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            'Accept': 'application/json',
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({
                            report: reportReason.value,
                            contentId: reportContentId.value,
                        }),
                    })
                    .then(async response => {
                        const data = await response.json();
                        return {
                            status: response.status,
                            data
                        };
                    })
                    .then(({
                        status,
                        data
                    }) => {
                        if (data.success) {
                            if (activeReportButton) {
                                activeReportButton.dataset.reported = '1';
                                activeReportButton.classList.remove('btn-outline-primary');
                                activeReportButton.classList.add('btn-secondary', 'report-locked');
                                activeReportButton.textContent = 'Reported';
                            }
                            reportModal.hide();
                            alert(data.message);
                            return;
                        }

                        if (status === 429 || data.cooldown_active) {
                            reportHelpText.textContent = data.message;
                            alert(data.message);
                        }
                    })
                    .catch(error => console.error('Report error:', error));
            });

            document.addEventListener('click', function(e) {
                const btn = e.target.closest('.save-btn');
                if (!btn) {
                    return;
                }

                const ownerId = btn.dataset.userId;
                const contentId = btn.dataset.contentId;
                const icon = btn.querySelector('i');

                fetch(`/content/saveContent/${ownerId}/${contentId}`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            'Accept': 'application/json',
                        },
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.saved) {
                            icon.classList.remove('fa-regular');
                            icon.classList.add('fa-solid');
                        } else {
                            icon.classList.remove('fa-solid');
                            icon.classList.add('fa-regular');
                        }
                    })
                    .catch(error => console.error('Save error:', error));
            });

            document.addEventListener('click', function(e) {
                const imageTrigger = e.target.closest('[data-bs-target="#imageModal"]');
                if (!imageTrigger) {
                    return;
                }

                document.getElementById('modalImage').src = imageTrigger.getAttribute('data-full-src');
            });
        });
    </script>
@endpush
