<x-mail::message>
# Welcome to the Papevi CMS Beta

Thanks for signing up! You're now on the list for early access to Papevi CMS — the content platform for ambitious teams.

We're building something special: a writing-first CMS with structured content, editorial workflow, and API-first delivery built in from day one.

We'll keep you posted on progress and let you know as soon as beta access is available.

<x-mail::button :url="config('app.url')">
Visit Papevi
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
