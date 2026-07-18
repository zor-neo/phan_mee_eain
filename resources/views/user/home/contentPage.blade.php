@extends('user.layout.master')
@section('container')
    <main>
        <section class="sw-section">
            <div class="container-lg">

                {{-- filter --}}
                <div class="row">
                    <div class="col-7 d-flex justify-content-between mb-3">
                        @php
                            $activeFunction = fn($value) => $find == $value ? 'active' : '';
                        @endphp
                        <a href="{{ route('content#Page', ['find' => 'default']) }}" class="btn btn-outline-primary h-50 {{ $activeFunction('default') }}">All Contents</a>
                        <a href="{{ route('content#Page', ['find' => 'edu']) }}" class="btn btn-outline-primary h-50 {{ $activeFunction('edu') }}">Education</a>
                        <a href="{{ route('content#Page', ['find' => 'kno']) }}" class="btn btn-outline-primary h-50 {{ $activeFunction('kno') }}">Knowledge</a>
                        <a href="{{ route('content#Page', ['find' => Auth::user()->id]) }}" class="btn btn-outline-primary h-50 {{ $activeFunction(Auth::user()->id) }}">Your Saved</a>
                    </div>
                    <div class="col-4 offset-1">
                        <form action="{{ route('content#Page') }}" method="get" class="row">
                            @csrf
                            <div class="col-7">
                                <input type="text" name="search" id="" class="form-control" placeholder="Search.....">
                            </div>
                            <div class="col-4">
                                <button type="submit" class="form-control btn btn-outline-primary "><i class="fa-solid fa-magnifying-glass text-primary"></i></button>
                            </div>
                        </form>
                        <div class="col-12 dropdown mt-2 mb-2">
                            <button class="btn btn-outline-primary dropdown-toggle w-100" type="button"
                                id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                Categories
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                @foreach ($category as $item)
                                    <li>
                                        <a class="dropdown-item {{ $activeFunction($item->id) }}" href="{{ route('content#Page', ['find' => $item->id]) }}">{{ $item->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                {{---content---}}
                <div class="card">
                    <div class="card-body">

                        <div class=" active text-center">
                            <div class="d-flex justify-content-center">
                                <img src="{{ asset('content/image/logo.jpg') }}" alt="" class="w-25 h-25">
                            </div>
                            <p class="fw-bold fs-4">Knowledge and Education</p>
                        </div>
                        @foreach ($latest as $item)
                            <div class="card text-center mb-3">
                                <div class="card-header">
                                    <div class="row mt-2">
                                        <div class="col-3">
                                            <a href="">
                                                <img src="{{ asset($item->userImage != null ? 'profile/' . $item->userImage : 'image/user-male-circle.jpg') }}"
                                                    alt="..." class="rounded rounded-2 w-25 h-100">
                                                <span class="ms-2">{{ $item->userName }}</span>
                                            </a>
                                        </div>
                                        <div class="col-4 offset-5">
                                            <span class="badge bg-secondary mb-2 align-self-start"><i
                                                    class="fas fa-bars-staggered"></i>
                                                {{ $item->categoryName }}</span>
                                            <span class="badge bg-secondary mb-2 align-self-start"><i
                                                    class="fas fa-bars-staggered"></i>
                                                {{ $item->role == 'kno' ? 'Article(ဆောင်းပါး)' : 'Education' }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title fw-bold fs-5">{{ $item->title }}</h5>
                                    <div class="row">
                                        <div class="col-5 mb-1">
                                            <img style="width: 100%; height: 150px; object-fit: cover; cursor: pointer;"
                                                src="{{ $item->contentImage ? asset('content/' . $item->contentImage) : asset('content/image/logo.jpg') }}"
                                                alt="..." data-bs-toggle="modal" data-bs-target="#imageModal"
                                                data-full-src="{{ $item->contentImage ? asset('content/' . $item->contentImage) : asset('content/image/logo.jpg') }}">
                                        </div>
                                        <div class="col-6 offset-1 mt-3" x-data="{ expanded: false }">
                                            <p class="card-text">
                                                <span
                                                    x-show="!expanded">{{ Str::words($item->content, 50, '.....') }}</span>
                                                <span x-show="expanded" x-cloak>{{ $item->content }}</span>
                                            </p>
                                            {{-- see all btn (using Alpine.js) --}}
                                            @if (str_word_count($item->content) > 50)
                                                <button type="button" class="btn btn-link p-0"
                                                    @click="expanded = !expanded">
                                                    <span x-show="!expanded" class="btn btn-outline-primary p-2">See
                                                        all</span>
                                                    <span x-show="expanded" x-cloak class="btn btn-outline-primary p-2">See
                                                        less</span>
                                                </button>
                                            @endif
                                        </div>
                                    </div>
                                    <a href="javascript:void(0)" class="btn btn-outline-primary mt-0 ms-2 save-btn"
                                        data-user-id="{{ Auth::user()->id }}" data-content-id="{{ $item->contentId }}">
                                        <i
                                            class="{{ in_array($item->contentId, $savedContentIds) ? 'fa-solid' : 'fa-regular' }} fa-bookmark"></i>
                                    </a>

                                    {{-- created duration --}}
                                    <div class="mt-2 mb-1">
                                        <p class="text-muted">{{ $item->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                                {{-- react like,unlike,love --}}
                                <div class="card-footer text-body-secondary d-flex justify-content-between mt-1">
                                    @php
                                        $myReact = $contents[$item->contentId]->reacts->firstWhere(
                                            'user_id',
                                            Auth::id(),
                                        );
                                        $myReactType = $myReact->react ?? null;
                                    @endphp
                                    <div class="mt-2 react-buttons" data-content-id="{{ $item->contentId }}"
                                        data-base-url="{{ url('/content/react') }}">

                                        <button type="button"
                                            class="btn btn-outline-primary react-btn {{ $myReactType == 0 ? 'active-react' : '' }}"
                                            data-react="0">
                                            <i
                                                class="fa-{{ $myReactType == 0 ? 'solid' : 'regular' }} fa-thumbs-up fs-5"></i>
                                            <span
                                                class="likes-count">{{ $contents[$item->contentId]->likes_count ?? 0 }}</span>
                                        </button>
                                        <button type="button"
                                            class="btn btn-outline-primary react-btn {{ $myReactType == 1 ? 'active-react' : '' }}"
                                            data-react="1">
                                            <i class="fa-{{ $myReactType == 1 ? 'solid' : 'regular' }} fa-heart fs-5"></i>
                                            <span
                                                class="loves-count">{{ $contents[$item->contentId]->loves_count ?? 0 }}</span>
                                        </button>
                                        <button type="button"
                                            class="btn btn-outline-primary react-btn {{ $myReactType == 2 ? 'active-react' : '' }}"
                                            data-react="2">
                                            <i
                                                class="fa-{{ $myReactType == 2 ? 'solid' : 'regular' }} fa-face-frown fs-5"></i>
                                            <span
                                                class="unlikes-count">{{ $contents[$item->contentId]->unlikes_count ?? 0 }}</span>
                                        </button>

                                        {{-- Total reaction count --}}
                                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="collapse"
                                            href="#reactList{{ $item->contentId }}">
                                            <span
                                                class="total-count">{{ $contents[$item->contentId]->reacts->count() ?? 0 }}</span>
                                            reactions
                                        </button>

                                        {{-- User list --}}
                                        <div class="collapse mt-2" id="reactList{{ $item->contentId }}">
                                            <ul class="list-group react-user-list">
                                                @forelse ($contents[$item->contentId]->reacts ?? [] as $react)
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
                                    {{-- comment process start --}}
                                    <div class="col-5 mt-2 mb-0">
                                        <p class="d-inline-flex gap-1 align-items-center">
                                            <a class="btn btn-outline-primary" data-bs-toggle="collapse"
                                                href="#commentList{{ $item->contentId }}" role="button"
                                                aria-expanded="false">
                                                Comment
                                            </a>
                                            <span class="comment-count-badge" data-content-id="{{ $item->contentId }}">
                                                {{ $contents[$item->contentId]->comments_count ?? 0 }} comments
                                            </span>
                                        </p>

                                        <div class="collapse" id="commentList{{ $item->contentId }}">
                                            <div class="card card-body">
                                                <ul class="list-group comment-list mb-2">
                                                    @forelse ($contents[$item->contentId]->comments ?? [] as $comment)
                                                        <li class="list-group-item mb-2 d-flex justify-content-between"
                                                            data-comment-id="{{ $comment->id }}">
                                                            <div class="card border border-0">
                                                                <strong>{{ $comment->user->name ?? 'Unknown' }}</strong>
                                                                <p class="mb-0 card-text">{{ $comment->comment }}</p>
                                                                <small
                                                                    class="text-muted mt-3">{{ $comment->created_at->diffForHumans() }}</small>
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
                                                        <li class="list-group-item text-muted no-comment">There is no
                                                            comments</li>
                                                    @endforelse
                                                </ul>
                                            </div>

                                            {{-- Comment form --}}
                                            <form class="comment-form rounded rounded-2 mt-1"
                                                data-content-id="{{ $item->contentId }}">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-9 ms-1 mt-1 mb-1">
                                                        <input type="text" name="comment"
                                                            class="form-control comment-input"
                                                            placeholder="Write a comment..." autocomplete="off">
                                                    </div>
                                                    <div class="col-2 mt-1">
                                                        <button type="submit" class="btn btn-outline-primary">
                                                            <i class="fa-solid fa-paper-plane"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    {{-- comment process end --}}
                                    <div class="d-flex col-3">
                                        <form action="{{ route('report.Process') }}" method="post"
                                            class="rounded rounded-2 mt-1 report-form"
                                            data-content-id="{{ $item->contentId }}">
                                            @csrf
                                            <input type="hidden" name="userId" value="{{ Auth::user()->id }}">
                                            <input type="hidden" name="contentId" value="{{ $item->contentId }}">
                                            <div class="row">
                                                <div class="col-8 ms-1 mt-1 mb-1">
                                                    <select name="report"
                                                        class="form-control border border-outline-primary">
                                                        <option value="Harassment or Bullying">Harassment or Bullying
                                                        </option>
                                                        <option value="Hate Speech">Hate Speech</option>
                                                        <option value="Spam">Spam</option>
                                                        <option value="Unauthorized Sales or Scams">Unauthorized Sales or
                                                            Scams</option>
                                                        <option value="Violence or Gore">Violence or Gore</option>
                                                    </select>
                                                </div>
                                                <div class="col-3 mt-1 ms-0 me-0">
                                                    <input type="submit" value="Report" class="btn btn-outline-primary">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <span>{{ $latest->links() }}</span>
                </div>
            </div>
            </div>
            {{-- Latest end --}}

            {{-- Education Start --}}
            <label for="" class="mb-2 fw-bold fs-4 mt-5">Education</label>
            {{-- Education end --}}

            {{-- articals (Saung Par) start --}}
            <label for="" class="mb-2 fw-bold fs-4 mt-5">Articles(Saung Par)</label>
            {{-- articals (Saung Par) end --}}

            {{-- Saved start --}}
            <label for="" class="mb-2 fw-bold fs-4 mt-5">Saved (My collection)</label>
            {{-- Saved end --}}

            </div>
        </section>
    </main>
@endsection
@push('jq-section')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const userId = {{ Auth::user()->id }};


            function reactLabel(reactType) {
                if (reactType === 0) {
                    return '<i class="fa-solid fa-thumbs-up text-primary"></i> Like';
                } else if (reactType === 1) {
                    return '<i class="fa-solid fa-heart text-danger"></i> Love';
                } else {
                    return '<i class="fa-solid fa-face-frown text-secondary"></i> Un-like';
                }
            }

            function renderUserList(container, reactList) {
                const listEl = container.querySelector('.react-user-list');
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
                    const reactType = parseInt(btn.dataset.react);

                    // အားလုံးကို ပထမ regular / inactive ပြန်ထားပါ
                    btn.classList.remove('active-react');
                    icon.classList.remove('fa-solid');
                    icon.classList.add('fa-regular');

                    // user ရဲ့ current react ကိုက်ညီရင် solid + active ပြောင်းပါ
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
                                'X-CSRF-TOKEN': document.querySelector(
                                    'meta[name="csrf-token"]').content
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            container.querySelector('.likes-count').textContent = data
                                .likes_count;
                            container.querySelector('.loves-count').textContent = data
                                .loves_count;
                            container.querySelector('.unlikes-count').textContent = data
                                .unlikes_count;
                            container.querySelector('.total-count').textContent = data
                                .total_count;

                            renderUserList(container, data.react_list);
                            updateActiveIcon(container, data.my_react);
                        })
                        .catch(error => console.error('Error:', error));
                });
            });
            // -------- Comment submit --------
            document.querySelectorAll('.comment-form').forEach(function(form) {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();

                    const contentId = form.dataset.contentId;
                    const input = form.querySelector('.comment-input');
                    const commentText = input.value.trim();

                    if (commentText === '') return;

                    fetch("{{ route('comment.Process') }}", {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document
                                    .querySelector('meta[name="csrf-token"]').content
                            },
                            body: JSON.stringify({
                                userId: userId,
                                contentId: contentId,
                                comment: commentText
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            const listEl = document.querySelector(
                                `#commentList${contentId} .comment-list`
                            );

                            const noComment = listEl.querySelector('.no-comment');
                            if (noComment) noComment.remove();

                            const li = document.createElement('li');
                            li.className =
                                'list-group-item mb-2 d-flex justify-content-between'; //...
                            li.dataset.commentId = data.comment.id;

                            const div = document.createElement('div');
                            div.className = 'card border border-0';
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
                                delBtn.className =
                                    'btn btn-sm btn-outline-danger comment-delete-btn ms-3';
                                delBtn.dataset.commentId = data.comment.id;
                                delBtn.innerHTML = '<i class="fa-solid fa-trash"></i>';
                                li.appendChild(delBtn);
                            }

                            listEl.appendChild(li);


                            const badge = document.querySelector(
                                `.comment-count-badge[data-content-id="${contentId}"]`);
                            if (badge) badge.textContent = `${data.comment_count} comments`;

                            input.value = '';
                        })
                        .catch(error => console.error('Error:', error));
                });
            });
            // -------- Comment delete--------
            document.addEventListener('click', function(e) {
                const btn = e.target.closest('.comment-delete-btn');
                if (!btn) return;

                if (!confirm('Do you want to delete this comment?')) return;

                const commentId = btn.dataset.commentId;
                const li = btn.closest('li');
                const commentList = li.closest('.comment-list');
                const collapseContainer = li.closest('.collapse');
                const contentId = collapseContainer.id.replace('commentList', '');

                fetch(`/content/comment/delete/${commentId}`, {
                        method: 'DELETE',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document
                                .querySelector('meta[name="csrf-token"]').content
                        }
                    })
                    .then(response => {
                        if (!response.ok) throw new Error('Delete failed');
                        return response.json();
                    })
                    .then(data => {
                        li.remove();


                        const badge = document.querySelector(
                            `.react-buttons[data-content-id="${contentId}"]`
                        )?.closest('.card-footer')?.querySelector('.comment-count-badge');
                        if (badge) badge.textContent = `${data.comment_count} comments`;


                        if (commentList.children.length === 0) {
                            commentList.innerHTML =
                                '<li class="list-group-item text-muted no-comment">There is no comment</li>';
                        }
                    })
                    .catch(error => console.error('Error:', error));
            });

            //report process
            document.addEventListener('submit', function(e) {
                if (!e.target.matches('.report-form')) return;

                e.preventDefault();

                const form = e.target;
                const formData = new FormData(form);

                fetch(form.action, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            'Accept': 'application/json',
                        },
                        body: formData,
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert(data.message);
                            form.reset();
                        }
                    })
                    .catch(error => console.error('Report error:', error));
            });
            // save content
            document.addEventListener('click', function(e) {
                const btn = e.target.closest('.save-btn');
                if (!btn) return;

                const userId = btn.dataset.userId;
                const contentId = btn.dataset.contentId;
                const icon = btn.querySelector('i');

                fetch(`/content/saveContent/${userId}/${contentId}`, {
                        method: 'GET',
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

            // see All content
            document.addEventListener('click', function(e) {
                if (e.target.classList.contains('see-all-btn')) {
                    const btn = e.target;
                    const p = document.getElementById(btn.dataset.target);
                    const isExpanded = btn.textContent.trim() === 'See less';
                    p.textContent = isExpanded ? btn.dataset.short : btn.dataset.full;
                    btn.textContent = isExpanded ? 'See all' : 'See less';
                }
            });

            // image pointer
            document.addEventListener('click', function(e) {
                if (e.target.closest('[data-bs-target="#imageModal"]')) {
                    const src = e.target.getAttribute('data-full-src');
                    document.getElementById('modalImage').src = src;
                }
            });
        });
    </script>
@endpush
