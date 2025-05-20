<div class="chat-content">
  <div class="d-flex align-items-center mb-3">
    <ul class="list-inline me-auto mb-0">
      <li class="list-inline-item align-bottom">
        <a
          href="#"
          class="d-xxl-none avtar avtar-s btn-link-secondary"
          data-bs-toggle="offcanvas"
          data-bs-target="#offcanvas_User_list"
          ><i class="ti ti-menu-2 f-18"></i> </a
        ><a
          href="#"
          class="d-none d-xxl-inline-flex avtar avtar-s btn-link-dark"
          data-bs-toggle="collapse"
          data-bs-target="#chat-user_list"
          ><i class="ti ti-menu-2 f-18"></i
        ></a>
      </li>
      <li class="list-inline-item">
        <div class="d-flex align-items-center">
          <div class="flex-shrink-0">
            <div class="chat-avtar">
              <img
                class="rounded-circle img-fluid wid-40"
                src="{{ asset('assets/images/user/avatar-5.jpg') }}"
                alt="User image"
              />
              <i class="chat-badge bg-success"></i>
            </div>
          </div>
          <div
            class="flex-grow-1 mx-3 d-none d-sm-inline-block"
          >
            <h6 class="mb-0">
              @if ($activeConversation)
                {{ optional($activeConversation->getOtherParticipant(auth()->user()))->name ?? 'Unknown' }}
              @else
                Select a conversation
              @endif
            </h6>
            <span class="text-sm text-muted"
              >ui/ux designer</span
            >
          </div>
        </div>
      </li>
    </ul>
    <ul class="list-inline ms-auto mb-0">
      <li class="list-inline-item">
        <a href="#" class="avtar avtar-s btn-link-dark"
          ><i class="ti ti-phone-call f-18"></i
        ></a>
      </li>
      <li class="list-inline-item">
        <a href="#" class="avtar avtar-s btn-link-dark"
          ><i class="ti ti-video f-18"></i
        ></a>
      </li>
      <li class="list-inline-item">
        <a
          href="#"
          class="d-xxl-none avtar avtar-s btn-link-dark"
          data-bs-toggle="offcanvas"
          data-bs-target="#offcanvas_User_info"
          ><i class="ti ti-info-circle f-18"></i> </a
        ><a
          href="#"
          class="d-none d-xxl-inline-flex avtar avtar-s btn-link-dark"
          data-bs-toggle="collapse"
          data-bs-target="#chat-user_info"
          ><i class="ti ti-info-circle f-18"></i
        ></a>
      </li>
      <li class="list-inline-item">
        <div class="dropdown">
          <a
            class="avtar avtar-s btn-link-secondary dropdown-toggle arrow-none"
            href="#"
            data-bs-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false"
            ><i class="ti ti-dots f-18"></i
          ></a>
          <div class="dropdown-menu dropdown-menu-end">
            <a class="dropdown-item" href="#">Name</a>
            <a class="dropdown-item" href="#">Date</a>
            <a class="dropdown-item" href="#">Ratting</a>
            <a class="dropdown-item" href="#">Unread</a>
          </div>
        </div>
      </li>
    </ul>
  </div>
  <div class="card bg-light-dark shadow-none card-border-none mb-0">
    <div class="scroll-block chat-message" style="max-height: 100%; overflow-y: auto;">
      <div class="card-body">
        @foreach ($messages as $message)
            @php
                $isOwnMessage = $message->sender_id === auth()->id();
                $sender = $message->sender; // asumsi ada relasi 'sender'
            @endphp

            @if ($isOwnMessage)
                {{-- Message Out --}}
                <div class="message-out">
                    <div class="d-flex align-items-end flex-column">
                        <p class="mb-1 text-muted">
                            <small>{{ $message->created_at->diffForHumans() }}</small>
                        </p>
                        <div class="message d-flex align-items-end flex-column">
                            <div class="d-flex align-items-center mb-1 chat-msg">
                                <div class="flex-shrink-0">
                                    <ul class="list-inline ms-auto mb-0 chat-msg-option">
                                        {{-- dropdown opsional --}}
                                    </ul>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <div class="msg-content bg-primary">
                                        <p class="mb-0 text-white">{{ $message->body }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                {{-- Message In --}}
                <div class="message-in">
                    <div class="d-flex">
                        <div class="flex-shrink-0">
                            <div class="chat-avtar">
                                <img class="rounded-circle img-fluid wid-40"
                                    src="{{ $sender->avatar_url ?? asset('assets/images/user/avatar-3.jpg') }}"
                                    alt="{{ $sender->name }}">
                                <i class="chat-badge bg-success"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 mx-3">
                            <div class="d-flex align-items-start flex-column">
                                <p class="mb-1 text-muted">
                                    {{ $sender->name }} <small>{{ $message->created_at->format('h:i A') }}</small>
                                </p>
                                <div class="message d-flex align-items-start flex-column">
                                    <div class="d-flex align-items-center mb-1 chat-msg">
                                        <div class="flex-grow-1 me-3">
                                            <div class="msg-content card card-border-none mb-0">
                                                <p class="mb-0">{{ $message->body }}</p>
                                            </div>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <ul class="list-inline ms-auto mb-0 chat-msg-option">
                                                {{-- dropdown opsional --}}
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
      </div>
    </div>
  </div>
  <div class="card-footer border-top pt-2 px-3 pb-0">
    <div class="input-group align-items-center">
      <ul class="list-inline me-auto mb-0">
        <li class="list-inline-item">
          <a
            href="#"
            class="avtar avtar-xs btn-link-secondary"
            ><i class="ti ti-paperclip f-18"></i
          ></a>
        </li>
        <li class="list-inline-item">
          <a
            href="#"
            class="avtar avtar-xs btn-link-secondary"
            ><i class="ti ti-photo f-18"></i
          ></a>
        </li>
        <li class="list-inline-item">
          <a
            href="#"
            class="avtar avtar-xs btn-link-secondary"
            ><i class="ti ti-mood-smile f-18"></i
          ></a>
        </li>
      </ul>
      <input
        type="text"
        class="form-control shadow-none border-0 bg-transparent"
        placeholder="Type a Message"
      />
      <ul class="list-inline ms-auto mb-0">
        <li class="list-inline-item">
          <a
            href="#"
            class="avtar avtar-s rounded-circlen btn btn-primary"
            ><i class="ti ti-send f-18"></i
          ></a>
        </li>
      </ul>
    </div>
  </div>
</div>