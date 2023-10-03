<?php

namespace App\Domain\Invoice;

class InvoiceService
{
    private $invoiceRepository;

    public function __construct(InvoiceRepository $invoiceRepository)
    {
        $this->invoiceRepository = $invoiceRepository;
    }

    public function approveInvoice(int $invoiceId): void
    {
        $invoice = $this->invoiceRepository->findById($invoiceId);

        if ($invoice && $invoice->getStatus() === 'pending') {
            $invoice->setStatus('approved');
            $this->invoiceRepository->save($invoice);
        }
    }

    public function rejectInvoice(int $invoiceId): void
    {
        $invoice = $this->invoiceRepository->findById($invoiceId);

        if ($invoice && $invoice->getStatus() === 'pending') {
            $invoice->setStatus('rejected');
            $this->invoiceRepository->save($invoice);
        }
    }
}
