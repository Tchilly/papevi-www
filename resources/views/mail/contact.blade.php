<x-mail::message>
# New contact message

**From:** {{ $contact['name'] }} &lt;{{ $contact['email'] }}&gt;
**Subject:** {{ $contact['subject'] }}

{{ $contact['body'] }}

---
*Sent via the Papevi website contact form.*
</x-mail::message>
