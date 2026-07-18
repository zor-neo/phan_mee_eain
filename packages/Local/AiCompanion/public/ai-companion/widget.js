(function () {
    function onReady(callback) {
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', callback);
        } else {
            callback();
        }
    }

    onReady(function () {
        const toggleButton = document.getElementById('guru-toggle');
        const closeButton = document.getElementById('guru-close');
        const panel = document.getElementById('guru-panel');
        const form = document.getElementById('guru-form');
        const input = document.getElementById('guru-input');
        const messagesBox = document.getElementById('guru-messages');

        const widget = document.getElementById('guru-widget');
        const csrfToken = widget ? widget.getAttribute('data-csrf-token') : '';
        const sessionUrl = widget ? widget.getAttribute('data-session-url') : '/ai/session';
        const chatUrl = widget ? widget.getAttribute('data-chat-url') : '/ai/chat';

        if (!toggleButton || !closeButton || !panel || !form || !input || !messagesBox || !widget) {
            console.error('Guru widget elements not found.');
            return;
        }

        let hasLoadedSession = false;

        const welcomeMessage = "I am the Great Guru, I can show you the righteous way, all you need to do is Ask.";

        function escapeHtml(value) {
            return String(value)
                .replace(/&/g, '&amp;')
                .replace(/</g, '&lt;')
                .replace(/>/g, '&gt;')
                .replace(/"/g, '&quot;')
                .replace(/'/g, '&#039;');
        }

        function isTableSeparator(line) {
            return /^\s*\|?\s*:?-{3,}:?\s*(\|\s*:?-{3,}:?\s*)+\|?\s*$/.test(line);
        }

        function splitTableRow(line) {
            return line
                .trim()
                .replace(/^\|/, '')
                .replace(/\|$/, '')
                .split('|')
                .map(function (cell) {
                    return cell.trim();
                });
        }

        function renderContent(content) {
            const lines = String(content || '').split('\n');
            let html = '';
            let i = 0;

            while (i < lines.length) {
                const current = lines[i] || '';
                const next = lines[i + 1] || '';

                if (current.indexOf('|') !== -1 && isTableSeparator(next)) {
                    const headers = splitTableRow(current);
                    const rows = [];

                    i += 2;

                    while (i < lines.length && lines[i].indexOf('|') !== -1) {
                        rows.push(splitTableRow(lines[i]));
                        i++;
                    }

                    html += '<div class="guru-table-wrap">';
                    html += '<table class="guru-table"><thead><tr>';

                    headers.forEach(function (header) {
                        html += '<th>' + escapeHtml(header) + '</th>';
                    });

                    html += '</tr></thead><tbody>';

                    rows.forEach(function (row) {
                        html += '<tr>';

                        headers.forEach(function (_, index) {
                            html += '<td>' + escapeHtml(row[index] || '') + '</td>';
                        });

                        html += '</tr>';
                    });

                    html += '</tbody></table></div>';
                    continue;
                }

                html += escapeHtml(current);

                if (i < lines.length - 1) {
                    html += '<br>';
                }

                i++;
            }

            return html;
        }

        function createMessage(role) {
            const bubble = document.createElement('div');

            bubble.className = 'guru-message ' + (
                role === 'user' ? 'guru-user' : 'guru-assistant'
            );

            messagesBox.appendChild(bubble);
            messagesBox.scrollTop = messagesBox.scrollHeight;

            return bubble;
        }

        function addMessage(role, content) {
            const bubble = createMessage(role);
            bubble.innerHTML = renderContent(content);
            messagesBox.scrollTop = messagesBox.scrollHeight;
            return bubble;
        }

        function showWelcome() {
            messagesBox.innerHTML = '';
            addMessage('assistant', welcomeMessage);
        }

        function setSending(isSending) {
            input.disabled = isSending;
            form.querySelector('button').disabled = isSending;
        }

        async function loadSession() {
            if (hasLoadedSession) {
                return;
            }

            hasLoadedSession = true;

            try {
                const response = await fetch(sessionUrl, {
                    method: 'GET',
                    headers: {
                        'Accept': 'application/json'
                    },
                    credentials: 'same-origin'
                });

                const data = await response.json();

                messagesBox.innerHTML = '';

                if (Array.isArray(data.messages) && data.messages.length > 0) {
                    data.messages.forEach(function (message) {
                        addMessage(message.role, message.content);
                    });
                } else {
                    addMessage('assistant', welcomeMessage);
                }
            } catch (error) {
                showWelcome();
            }
        }

        function openPanel() {
            panel.hidden = false;
            loadSession();
            input.focus();
        }

        function closePanel() {
            panel.hidden = true;
        }

        function togglePanel() {
            if (panel.hidden) {
                openPanel();
            } else {
                closePanel();
            }
        }

        toggleButton.addEventListener('click', togglePanel);
        closeButton.addEventListener('click', closePanel);

        document.addEventListener('click', function (event) {
            const trigger = event.target.closest('[data-guru-open]');

            if (!trigger) {
                return;
            }

            event.preventDefault();
            openPanel();
        });

        document.addEventListener('guru:open', openPanel);

        window.GuruChat = Object.assign(window.GuruChat || {}, {
            open: openPanel,
            close: closePanel,
            toggle: togglePanel
        });

        form.addEventListener('submit', async function (event) {
            event.preventDefault();

            const userMessage = input.value.trim();

            if (!userMessage) {
                return;
            }

            addMessage('user', userMessage);

            input.value = '';
            setSending(true);

            const loadingBubble = document.createElement('div');
            loadingBubble.className = 'guru-message guru-assistant';
            loadingBubble.textContent = 'Guru will enlighten you soon...';
            messagesBox.appendChild(loadingBubble);
            messagesBox.scrollTop = messagesBox.scrollHeight;

            try {
                const response = await fetch(chatUrl, {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    credentials: 'same-origin',
                    body: JSON.stringify({
                        message: userMessage
                    })
                });

                let data = {};

                try {
                    data = await response.json();
                } catch (error) {
                    data = {};
                }

                loadingBubble.remove();

                if (!response.ok) {
                    if (response.status === 419) {
                        addMessage('assistant', 'Your session expired. Please refresh the page and try again.');
                        return;
                    }

                    if (response.status === 429) {
                        addMessage('assistant', 'You are sending messages too quickly. Please wait a moment and try again.');
                        return;
                    }

                    addMessage('assistant', data.message || 'The Great Guru is temporarily unavailable. Please try again later.');
                    return;
                }

                addMessage('assistant', data.reply);
            } catch (error) {
                loadingBubble.remove();
                addMessage('assistant', 'The Great Guru is temporarily unavailable. Please try again later.');
            } finally {
                setSending(false);
                input.focus();
            }
        });
    });
})();
