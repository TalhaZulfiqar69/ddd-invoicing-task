<?php

namespace App\Http\Controllers;
use App\Domain\Invoice\InvoiceService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class InvoiceController extends Controller
{
    private $invoiceService;

    public function __construct(InvoiceService $invoiceService)
    {
        $this->invoiceService = $invoiceService;
    }

    public function show(int $id)
    {
        $invoice = $this->invoiceService->getInvoiceById($id);

        if (!$invoice) {
            return response()->json(['message' => 'Invoice not found'], Response::HTTP_NOT_FOUND);
        }

        return response()->json(['invoice' => $invoice]);
    }

    public function approve(int $id)
    {
        try {
            $this->invoiceService->approveInvoice($id);
            return response()->json(['message' => 'Invoice approved'], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }

    public function reject(int $id)
    {
        try {
            $this->invoiceService->rejectInvoice($id);
            return response()->json(['message' => 'Invoice rejected'], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }
}
