<?php

namespace App\Domain\Invoice;

interface InvoiceRepository
{
    public function findById(int $id): ?Invoice;
    public function save(Invoice $invoice): void;
}
