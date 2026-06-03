<?php

namespace App\Exports;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

class PengunjungExport implements
    FromCollection,
    WithHeadings,
    WithMapping,
    ShouldAutoSize,
    WithStyles,
    WithTitle
{
    protected Request $request;

    private int $no = 1;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /*
    |--------------------------------------------------------------------------
    | QUERY DATA
    |--------------------------------------------------------------------------
    */

    public function collection()
    {
        $search = $this->request->search;
        $tanggal = $this->request->tanggal;

        return Ticket::query()

            // SEARCH
            ->when($search, function ($query) use ($search) {

                $query->where(function ($q) use ($search) {

                    $q->where('nama', 'like', "%{$search}%")
                        ->orWhere('provinsi', 'like', "%{$search}%")
                        ->orWhere('kabupaten', 'like', "%{$search}%");

                });

            })

            // FILTER TANGGAL
            ->when($tanggal, function ($query) use ($tanggal) {

                $query->whereDate('tanggal_kunjungan', $tanggal);

            })

            // FILTER PROVINSI
            ->when($this->request->provinsi, function ($query) {

                $query->where('provinsi', $this->request->provinsi);

            })

            // FILTER TIKET
            ->when($this->request->jenis_tiket, function ($query) {

                $query->where('jenis_tiket', $this->request->jenis_tiket);

            })

            ->latest()

            ->get();
    }

    /*
    |--------------------------------------------------------------------------
    | HEADER EXCEL
    |--------------------------------------------------------------------------
    */

    public function headings(): array
    {
        return [

            'No',
            'Nama Pengunjung',
            'Provinsi',
            'Kabupaten/Kota',
            'Instansi',
            'Kategori Pengunjung',
            'Kategori Umur',
            'Jenis Tiket',
            'Domestik/Mancanegara',
            'Tipe Kunjungan',
            'Jumlah Pengunjung',
            'Frekuensi',
            'Status Tiket',
            'Status Pembayaran',
            'Tanggal Kunjungan',

        ];
    }

    /*
    |--------------------------------------------------------------------------
    | FORMAT DATA
    |--------------------------------------------------------------------------
    */
    public function map($ticket): array
    {
        return [

            $this->no++,

            $ticket->nama,

            $ticket->provinsi ?? '-',

            $ticket->kabupaten ?? '-',

            $ticket->instansi ?? 'Umum',

            ucfirst($ticket->kategori_pengunjung ?? '-'),

            $ticket->kategori_umur ?? '-',

            ucfirst($ticket->jenis_tiket),

            ucfirst($ticket->kategori ?? '-'),

            ucfirst($ticket->tipe_kunjungan ?? '-'),

            $ticket->jenis_tiket == 'online'
                ? $ticket->jumlah_tiket
                : $ticket->jumlah_pengunjung,

            $ticket->frekuensi ?? '-',

            ucfirst($ticket->status),

            ucfirst($ticket->payment_status),

            \Carbon\Carbon::parse(
                $ticket->tanggal_kunjungan
            )->format('d M Y'),

        ];
    }
    /*
    |--------------------------------------------------------------------------
    | STYLE EXCEL
    |--------------------------------------------------------------------------
    */
    public function styles(Worksheet $sheet)
    {
        // Freeze Header
        $sheet->freezePane('A2');

        $sheet->setAutoFilter(
            $sheet->calculateWorksheetDimension()
        );

        // Tinggi Header
        $sheet->getRowDimension(1)->setRowHeight(30);

        // Rata Tengah Header
        $sheet->getStyle('A1:O1')
            ->getAlignment()
            ->setHorizontal(Alignment::HORIZONTAL_CENTER)
            ->setVertical(Alignment::VERTICAL_CENTER);

        // Rata Tengah Seluruh Isi
        $sheet->getStyle('A:O')
            ->getAlignment()
            ->setVertical(Alignment::VERTICAL_CENTER);

        $sheet->getStyle('A:A')
            ->getAlignment()
            ->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->getStyle('H:O')
            ->getAlignment()
            ->setHorizontal(Alignment::HORIZONTAL_CENTER);

        // Border Seluruh Tabel
        $lastRow = $sheet->getHighestRow();

        $sheet->getStyle("A1:O{$lastRow}")
            ->applyFromArray([
                'borders' => [
                    'allBorders' => [
                        'borderStyle' =>
                            \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => [
                            'rgb' => 'D1D5DB'
                        ]
                    ]
                ]
            ]);

        $sheet->getStyle("B2:B{$lastRow}")
            ->getFont()
            ->setBold(true);

        return [

            // HEADER
            1 => [

                'font' => [

                    'bold' => true,
                    'size' => 11,
                    'color' => [
                        'rgb' => 'FFFFFF'
                    ]

                ],

                'fill' => [

                    'fillType' => 'solid',

                    'startColor' => [
                        'rgb' => '062B30'
                    ]

                ],

            ],

        ];
    }

    /*
    |--------------------------------------------------------------------------
    | TITLE SHEET
    |--------------------------------------------------------------------------
    */

    public function title(): string
    {
        return 'Pengunjung Museum';
    }
}