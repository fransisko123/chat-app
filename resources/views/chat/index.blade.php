@extends('layouts.master')

@section('title', 'Chat')

@section('content')
  <div class="pc-container">
    <div class="pc-content">
      <!-- [ Main Content ] start -->
      <div class="row">
        <!-- [ sample-page ] start -->
        <div class="col-sm-12">
          <div class="card">
            <div class="card-body">
              <div class="chat-wrapper">
                <div
                  class="offcanvas-xxl offcanvas-start chat-offcanvas"
                  tabindex="-1"
                  id="offcanvas_User_list"
                >
                  <div class="offcanvas-header">
                    <button
                      class="btn-close"
                      data-bs-dismiss="offcanvas"
                      data-bs-target="#offcanvas_User_list"
                      aria-label="Close"
                    ></button>
                  </div>
                  <div class="offcanvas-body p-0">
                    <div
                      id="chat-user_list"
                      class="show collapse collapse-horizontal"
                    >
                      <div class="chat-user_list">
                        <div
                          class="card bg-transparent shadow-none border-0 overflow-hidden mb-0"
                        >
                          <div class="card-body px-0 pt-0">
                            <div class="d-flex align-items-center mb-4">
                              <div class="me-auto">
                                <h5 class="mb-0">
                                  Inbox
                                  <span
                                    class="avtar avtar-xs bg-light-primary"
                                    >9</span
                                  >
                                </h5>
                              </div>
                              <div class="ms-auto">
                                <div class="dropdown">
                                  <a
                                    class="avtar avtar-s btn-link-secondary dropdown-toggle arrow-none"
                                    href="#"
                                    data-bs-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                    ><i class="ti ti-dots f-18"></i
                                  ></a>
                                  <div
                                    class="dropdown-menu dropdown-menu-end"
                                  >
                                    <a class="dropdown-item" href="#"
                                      >Preferences</a
                                    >
                                    <a class="dropdown-item" href="#"
                                      >Edit profile</a
                                    >
                                    <a class="dropdown-item" href="#"
                                      >Go offline</a
                                    >
                                    <a class="dropdown-item" href="#"
                                      >Mark all read</a
                                    >
                                  </div>
                                </div>
                              </div>
                            </div>
                            <form class="form-search">
                              <i
                                class="ph-duotone ph-magnifying-glass icon-search"
                              ></i>
                              <input
                                type="search"
                                class="form-control w-100"
                                placeholder="Search here. . ."
                              />
                            </form>
                          </div>

                          {{-- Conversations list --}}
                          <div class="scroll-block">
                            <div class="card-body p-0">
                              <div class="list-group list-group-flush">
                                @foreach ($conversations as $conv)
                                 <div class="list-group-item list-group-item-action p-3 conversation-item" data-id="{{ $conv->id }}">
                                  <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                      <div class="chat-avtar">
                                        <img
                                          class="rounded-circle img-fluid wid-40"
                                          src="{{ asset('assets/images/user/avatar-3.jpg') }}"
                                          alt="User image"
                                        />
                                        <div
                                          class="bg-secondary bg-opacity-50 chat-badge"
                                        ></div>
                                      </div>
                                    </div>
                                    <div class="flex-grow-1 mx-2">
                                      <h6 class="mb-0">{{ $conv->getOtherParticipant(auth()->user())->name }}</h6>
                                      <div class="d-flex text-sm text-muted">
                                        <div
                                          class="flex-grow-1 position-relative"
                                        >
                                          <span>Programmer</span>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="flex-grow-1 position-relative">
                                      @php
                                        $unread = $conv->unreadCountFor(auth()->user());
                                      @endphp
                                      <span class="badge bg-info pc-h-badge ms-1 py-1 px-2 rounded-pill fw-bold small"
                                            style="{{ $unread > 0 ? '' : 'display:none;' }}; position: absolute; top: 50%; right: 0; transform: translateY(-50%); min-width: 1.5em; text-align: center;">
                                        {{ $unread > 0 ? $unread : '' }}
                                      </span>
                                    </div>
                                    <div class="dropdown">
                                      <a
                                        class="avtar avtar-xs btn-link-secondary dropdown-toggle arrow-none"
                                        href="#"
                                        data-bs-toggle="dropdown"
                                        aria-haspopup="true"
                                        aria-expanded="false"
                                        ><i
                                          class="ti ti-dots-vertical f-18"
                                        ></i
                                      ></a>
                                      <div
                                        class="dropdown-menu dropdown-menu-end"
                                      >
                                        <a class="dropdown-item" href="#"
                                          >Delete conversation</a
                                        >
                                        <a class="dropdown-item" href="#"
                                          >Mark as read</a
                                        >
                                        <a class="dropdown-item" href="#"
                                          >Profile</a
                                        >
                                      </div>
                                    </div>
                                  </div>
                                 </div>
                                @endforeach
                              </div>
                            </div>
                          </div>

                          <div class="card-body p-0">
                            <div class="list-group list-group-flush">
                              <a
                                href="#"
                                class="list-group-item list-group-item-action"
                                ><i class="ti ti-power"></i>
                                <span>Logout</span> </a
                              ><a
                                href="#"
                                class="list-group-item list-group-item-action"
                                ><i class="ti ti-settings"></i>
                                <span>Setting</span></a
                              >
                              <div class="list-group-item">
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
                                  <div class="flex-grow-1 mx-3">
                                    <h6 class="mb-0">{{ auth()->user()->name }}</h6>
                                    <span class="text-muted text-sm"
                                      >UI/UX Designer</span
                                    >
                                  </div>
                                  <div class="dropdown">
                                    <a
                                      class="avtar avtar-xs btn-link-secondary dropdown-toggle arrow-none"
                                      href="#"
                                      data-bs-toggle="dropdown"
                                      aria-haspopup="true"
                                      aria-expanded="false"
                                      ><i class="ti ti-chevron-right f-16"></i
                                    ></a>
                                    <div
                                      class="dropdown-menu dropdown-menu-end"
                                    >
                                      <a class="dropdown-item" href="#"
                                        ><i class="chat-badge bg-success"></i>
                                        Active</a
                                      >
                                      <a class="dropdown-item" href="#"
                                        ><i class="chat-badge bg-warning"></i>
                                        Away</a
                                      >
                                      <a class="dropdown-item" href="#"
                                        ><i
                                          class="chat-badge bg-secondary"
                                        ></i>
                                        Edit Do not disturb</a
                                      >
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                {{-- Chat Box --}}
                <div id="chatbox" class="flex-grow-1 d-flex flex-column">
                    @include('chat._chatbox', [
                      'messages' => $messages,
                      'activeConversation' => $activeConversation
                    ])
                </div>

                <div
                  class="offcanvas-xxl offcanvas-end chat-offcanvas"
                  tabindex="-1"
                  id="offcanvas_User_info"
                >
                  <div class="offcanvas-header">
                    <button
                      class="btn-close"
                      data-bs-dismiss="offcanvas"
                      data-bs-target="#offcanvas_User_info"
                      aria-label="Close"
                    ></button>
                  </div>
                  <div class="offcanvas-body p-0">
                    <div
                      id="chat-user_info"
                      class="collapse collapse-horizontal"
                    >
                      <div class="chat-user_info">
                        <div
                          class="card bg-transparent shadow-none border-0 mb-0"
                        >
                          <div
                            class="text-center card-body position-relative p-3 pb-0 px-0"
                          >
                            <h5 class="text-start">Profile View</h5>
                            <div
                              class="position-absolute end-0 top-0 p-2 d-none d-xxl-inline-flex"
                            >
                              <a
                                href="#"
                                class="avtar avtar-xs btn-link-danger btn-pc-default"
                                data-bs-toggle="collapse"
                                data-bs-target="#chat-user_info"
                                ><i class="ti ti-x f-16"></i
                              ></a>
                            </div>
                            <div class="chat-avtar d-inline-flex mx-auto">
                              <img
                                class="rounded-circle img-fluid wid-100"
                                src="{{ asset('assets/images/user/avatar-5.jpg') }}"
                                alt="User image"
                              />
                            </div>
                            <h5 class="mb-0">Alene</h5>
                            <p class="text-muted text-sm">
                              DM on
                              <a href="#" class="link-primary"
                                >@williambond</a
                              >
                            </p>
                            <ul class="list-inline ms-auto">
                              <li class="list-inline-item">
                                <a
                                  href="#"
                                  class="avtar avtar-s btn-link-secondary"
                                  ><i class="ti ti-phone-call f-18"></i
                                ></a>
                              </li>
                              <li class="list-inline-item">
                                <a
                                  href="#"
                                  class="avtar avtar-s btn-link-secondary"
                                  ><i class="ti ti-message-circle f-18"></i
                                ></a>
                              </li>
                              <li class="list-inline-item">
                                <a
                                  href="#"
                                  class="avtar avtar-s btn-link-secondary"
                                  ><i class="ti ti-video f-18"></i
                                ></a>
                              </li>
                            </ul>
                          </div>
                          <div class="scroll-block">
                            <div class="card-body p-0">
                              <div
                                class="form-check form-switch d-flex align-items-center justify-content-between p-0"
                              >
                                <label
                                  class="form-check-label h5 mb-0"
                                  for="customSwitchemlnot1"
                                  >Notification</label
                                >
                                <input
                                  class="form-check-input h5 mb-0 position-relative"
                                  type="checkbox"
                                  id="customSwitchemlnot1"
                                  checked=""
                                />
                              </div>
                              <hr
                                class="my-3 border border-secondary-subtle"
                              />
                              <a
                                class="btn border-0 p-0 text-start w-100"
                                data-bs-toggle="collapse"
                                href="#filtercollapse1"
                                ><div class="float-end">
                                  <i class="ti ti-chevron-down"></i>
                                </div>
                                <h5 class="mb-0">Information</h5></a
                              >
                              <div class="collapse show" id="filtercollapse1">
                                <div class="py-3">
                                  <div
                                    class="d-flex align-items-center justify-content-start mb-2"
                                  >
                                    <i class="ph-duotone ph-map-pin"></i>
                                    <p class="mb-0 text-muted ms-2">
                                      32188 Sips Parkways, U.S
                                    </p>
                                  </div>
                                  <div
                                    class="d-flex align-items-center justify-content-start mb-2"
                                  >
                                    <i
                                      class="ph-duotone ph-envelope-open"
                                    ></i>
                                    <p class="mb-0 text-muted ms-2">
                                      Keefe@codedtheme.com
                                    </p>
                                  </div>
                                  <div
                                    class="d-flex align-items-center justify-content-start mb-2"
                                  >
                                    <i class="ph-duotone ph-phone-call"></i>
                                    <p class="mb-0 text-muted ms-2">
                                      995-250-1803
                                    </p>
                                  </div>
                                  <div
                                    class="d-flex align-items-center justify-content-start mb-2"
                                  >
                                    <i
                                      class="ph-duotone ph-calendar-blank"
                                    ></i>
                                    <p class="mb-0 text-muted ms-2">
                                      30, Nov 2021
                                    </p>
                                  </div>
                                  <div
                                    class="d-flex align-items-center justify-content-start mb-2"
                                  >
                                    <i
                                      class="ph-duotone ph-globe-hemisphere-east"
                                    ></i>
                                    <p class="mb-0 text-muted ms-2">India</p>
                                  </div>
                                  <div
                                    class="d-flex align-items-center justify-content-start mb-2"
                                  >
                                    <i class="ph-duotone ph-briefcase"></i>
                                    <p class="mb-0 text-muted ms-2">
                                      <a href="#" class="link-primary"
                                        >Flat Able.com</a
                                      >
                                    </p>
                                  </div>
                                  <div
                                    class="d-flex align-items-center justify-content-start"
                                  >
                                    <i class="ph-duotone ph-radio-button"></i>
                                    <p class="mb-0 text-muted ms-2">
                                      <span
                                        class="badge bg-light-warning text-warning"
                                        >UI/UX Designer</span
                                      >
                                    </p>
                                  </div>
                                </div>
                              </div>
                              <hr
                                class="my-3 border border-secondary-subtle"
                              />
                              <a
                                class="btn border-0 p-0 text-start w-100"
                                data-bs-toggle="collapse"
                                href="#filtercollapse2"
                                ><div class="float-end">
                                  <i class="ti ti-chevron-down"></i>
                                </div>
                                <h5 class="mb-0">File type</h5></a
                              >
                              <div class="collapse show" id="filtercollapse2">
                                <div class="py-3">
                                  <div class="d-flex align-items-center mb-2">
                                    <div class="flex-shrink-0">
                                      <a
                                        href="#"
                                        class="avtar avtar-s btn-light-success"
                                        ><i class="ti ti-file-text f-20"></i
                                      ></a>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                      <h6 class="mb-0">Document</h6>
                                      <span class="text-muted text-sm"
                                        >123 files, 193MB</span
                                      >
                                    </div>
                                    <a
                                      href="#"
                                      class="avtar avtar-xs btn-link-secondary"
                                      ><i class="ti ti-chevron-right f-16"></i
                                    ></a>
                                  </div>
                                  <div class="d-flex align-items-center mb-2">
                                    <div class="flex-shrink-0">
                                      <a
                                        href="#"
                                        class="avtar avtar-s btn-light-danger"
                                        ><i class="ti ti-photo f-20"></i
                                      ></a>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                      <h6 class="mb-0">Photos</h6>
                                      <span class="text-muted text-sm"
                                        >53 files, 321MB</span
                                      >
                                    </div>
                                    <a
                                      href="#"
                                      class="avtar avtar-xs btn-link-secondary"
                                      ><i class="ti ti-chevron-right f-16"></i
                                    ></a>
                                  </div>
                                  <div class="d-flex align-items-center mb-2">
                                    <div class="flex-shrink-0">
                                      <a
                                        href="#"
                                        class="avtar avtar-s btn-light-primary"
                                        ><i class="ti ti-id f-20"></i
                                      ></a>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                      <h6 class="mb-0">Other</h6>
                                      <span class="text-muted text-sm"
                                        >49 files, 193MB</span
                                      >
                                    </div>
                                    <a
                                      href="#"
                                      class="avtar avtar-xs btn-link-secondary"
                                      ><i class="ti ti-chevron-right f-16"></i
                                    ></a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- [ sample-page ] end -->
      </div>
      <!-- [ Main Content ] end -->
    </div>
  </div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  let currentConversationId = null;
  let chatboxChannels = {}; // Simpan instance channel

  function loadChatBox(conversationId) {
    // Hapus listener MessageSent lama pada channel chatbox
    if (window.Echo && currentConversationId) {
      if (chatboxChannels[currentConversationId]) {
        chatboxChannels[currentConversationId].stopListening('MessageSent');
      }
    }
    currentConversationId = conversationId;

    // Subscribe listener baru untuk chatbox aktif
    if (window.Echo && conversationId) {
      // Gunakan instance channel yang sama jika sudah ada
      if (!chatboxChannels[conversationId]) {
        chatboxChannels[conversationId] = window.Echo.private(`private-conversations.${conversationId}`);
      }
      chatboxChannels[conversationId]
        .stopListening('MessageSent') // pastikan bersih sebelum listen ulang
        .listen('MessageSent', function(e) {
          if (String(e.message.conversation_id) !== String(conversationId)) return;

          // Render pesan ke chatbox
          const chatbox = document.querySelector('.chat-message .card-body');
          const noMessage = document.querySelector('.no-messages');
          if (!chatbox) return;

          const userId = document.querySelector('meta[name="user-id"]')?.content;
          const isOwn = e.message.sender_id == userId;
          const time = new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });

          const messageHTML = isOwn
              ? `
                  <div class="message-out">
                      <div class="d-flex align-items-end flex-column">
                          <p class="mb-1 text-muted"><small>${time}</small></p>
                          <div class="message d-flex align-items-end flex-column">
                              <div class="d-flex align-items-center mb-1 chat-msg">
                                  <div class="flex-grow-1 ms-3">
                                      <div class="msg-content bg-primary">
                                          <p class="mb-0 text-white">${e.message.body}</p>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>`
              : `
                  <div class="message-in">
                      <div class="d-flex">
                          <div class="chat-avtar">
                              <img class="rounded-circle img-fluid wid-40"
                                  src="${e.message.sender.avatar_url || '/assets/images/user/avatar-3.jpg'}" />
                          </div>
                          <div class="flex-grow-1 mx-3">
                              <p class="mb-1 text-muted">${e.message.sender.name} <small>${time}</small></p>
                              <div class="message d-flex align-items-start flex-column">
                                  <div class="msg-content card card-border-none mb-0">
                                      <p class="mb-0">${e.message.body}</p>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>`;

          chatbox.insertAdjacentHTML('beforeend', messageHTML);
          noMessage?.remove();
          // Update unread badge in sidebar (real-time)
          if (!isOwn) {
              updateUnreadBadge(e.message.conversation_id);
          }
          // Scroll ke bawah setelah pesan baru masuk
          const scrollBlock = document.querySelector('.chat-message');
          if (scrollBlock) {
              scrollBlock.scrollTop = scrollBlock.scrollHeight;
          }
        });
    }
  }

  // Listener sidebar: hanya update badge unread, tidak render pesan
  function initSidebarListeners() {
  if (window.Echo) {
    $('.conversation-item').each(function() {
      var conversationId = $(this).data('id');
      window.Echo.private('private-conversations.' + conversationId)
        .listen('MessageSent', function(e) {
          // Hanya update badge unread, jangan render pesan ke chatbox!
          fetch('/chat/unread-count/' + conversationId)
            .then(res => res.json())
            .then(data => {
              var badge = document.querySelector(
                '.conversation-item[data-id="' + conversationId + '"] .badge.bg-info.pc-h-badge'
              );
              if (badge) {
                badge.textContent = data.unread > 0 ? data.unread : '';
                badge.style.display = data.unread > 0 ? '' : 'none';
              }
            });
        });
    });
  }
}

  function updateUnreadBadge(conversationId) {
    fetch('/chat/unread-count/' + conversationId)
      .then(res => res.json())
      .then(data => {
        var badge = document.querySelector(
          '.conversation-item[data-id="' + conversationId + '"] .badge.bg-info.pc-h-badge'
        );
        if (badge) {
          badge.textContent = data.unread > 0 ? data.unread : '';
          badge.style.display = data.unread > 0 ? '' : 'none';
        }
      });
  }

  $(document).ready(function() {
    $('.conversation-item').click(function(e) {
      e.preventDefault();
      var conversationId = $(this).data('id');
      var url = "{{ route('chat') }}" + "?conversation=" + conversationId;

      $.ajax({
        url: url,
        method: 'GET',
        success: function(response) {
          $('#chatbox').html(response);
          loadChatBox(conversationId); // update listener chatbox aktif
          updateUnreadBadge(conversationId);

          if (window.loadChatBox) {
            window.loadChatBox();
            const scrollBlock = document.querySelector('.chat-message');
            if (scrollBlock) {
                scrollBlock.scrollTop = scrollBlock.scrollHeight;
            }
          } else {
            console.warn("loadChatBox tidak tersedia");
          }
        },
        error: function() {
          alert('Gagal memuat pesan.');
        }
      });
    });

    // Inisialisasi listener pertama kali jika ada chatbox aktif
    @if($activeConversation)
      loadChatBox({{ $activeConversation->id }});
    @endif

    // Listener sidebar untuk badge unread
    initSidebarListeners();
  });
</script>

<style>
/* Responsive badge for mobile */
@media (max-width: 576px) {
  .pc-h-badge {
    font-size: 0.75rem !important;
    padding: 2px 7px !important;
    min-width: 1.2em !important;
    right: 2px !important;
  }
}
</style>