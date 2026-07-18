@if (config('ai-companion.enabled', true))
    <link rel="stylesheet" href="{{ asset('vendor/ai-companion/ai-companion/widget.css') }}">

    <div
        id="guru-widget"
        data-csrf-token="{{ csrf_token() }}"
        data-session-url="{{ route('ai-companion.session') }}"
        data-chat-url="{{ route('ai-companion.chat') }}"
    >
        <button id="guru-toggle" type="button">
            <img src="{{ asset('vendor/ai-companion/ai-companion/guru_icon.svg') }}" style="width: 100%; height: 100%; object-fit: cover;" alt="The Great Guru">
        </button>

        <div id="guru-panel" hidden>
            <div id="guru-header">
                <strong>Guru</strong>
                <span>Ultimate mentor</span>
                <button id="guru-close" type="button">&times;</button>
            </div>

            <div id="guru-messages"></div>

            <form id="guru-form">
                <input
                    id="guru-input"
                    type="text"
                    placeholder="Ask the Great Guru for the righteous way..."
                    autocomplete="off"
                >
                <button type="submit">Send</button>
            </form>
        </div>
    </div>

    <script src="{{ asset('vendor/ai-companion/ai-companion/widget.js') }}"></script>
@endif
