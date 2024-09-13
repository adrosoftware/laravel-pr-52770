<?php

namespace App\Service\Mail;

use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Envelope;

/**
 * @internal
 */
class EnvelopeForPool
{
    /**
     * This WAS working fine before.
     */
    public static function failing(
        int $adminId,
        string $subject,
        string $fromName = 'Support Team',
        ?Address $replyTo = null,
    ): Envelope {
        $replyTo = $replyTo ? [$replyTo] : [new Address('support@example.com', $fromName)];

        return new Envelope(
            replyTo: $replyTo ? [$replyTo] : [],
            subject: $subject,
            metadata: [
                'company-from-name' => $fromName,
                'company-admin-id' => $adminId,
            ],
        );
    }

    /**
     * This IS working fine.
     */
    public static function working(
        int $adminId,
        string $subject,
        string $fromName = 'Support Team',
        ?Address $replyTo = null,
    ): Envelope {
        $replyTo = $replyTo ?? [new Address('support@example.com', $fromName)];

        return new Envelope(
            replyTo: $replyTo,
            subject: $subject,
            metadata: [
                'company-from-name' => $fromName,
                'company-admin-id' => $adminId,
            ],
        );
    }
}
