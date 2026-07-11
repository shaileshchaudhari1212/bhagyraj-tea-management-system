<?php

namespace App\Mail;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvoiceMail extends Mailable
{
    use Queueable, SerializesModels;

    public $sale;

    public function __construct($sale)
    {
        $this->sale = $sale;
    }

    public function build()
    {
        $pdf = Pdf::loadView(
            'admin.sales.invoice-pdf',
            ['sale' => $this->sale]
        );

        return $this->subject('Bhagyraj Tea Invoice')
            ->view('emails.invoice')
            ->attachData(
                $pdf->output(),
                'Invoice-' . ($this->sale->invoice_number ?? $this->sale->id) . '.pdf',
                [
                    'mime' => 'application/pdf',
                ]
            );
    }
}