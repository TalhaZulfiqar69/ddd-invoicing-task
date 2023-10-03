<?php

namespace App\Domain\Invoice;

class Invoice
{
    private $id;
    private $invoiceNumber;
    private $amount;
    private $status;

    public function __construct(int $id, string $invoiceNumber, float $amount, string $status)
    {
        $this->id = $id;
        $this->invoiceNumber = $invoiceNumber;
        $this->amount = $amount;
        $this->status = $status;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getInvoiceNumber(): string
    {
        return $this->invoiceNumber;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function getStatus(): string
    {
        return $this->status;
    }
}
