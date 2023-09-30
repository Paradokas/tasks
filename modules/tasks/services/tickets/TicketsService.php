<?php

namespace app\modules\tasks\services\tickets;

class TicketsService
{
    public function __construct(
        private readonly CreateTicket $createTicket,
        private readonly DeleteTicket $deleteTicket
    )
    {
    }
    public function createTicket($ticket): bool
    {
        return $this->createTicket->handle($ticket);
    }

    public function deleteTicket($id): bool
    {
        return $this->deleteTicket->handle($id);
    }
}