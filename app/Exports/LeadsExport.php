<?php

namespace App\Exports;

use App\Models\Lead;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LeadsExport implements FromCollection, WithHeadings
{

    public function headings(): array
    {
        return [
            '#',
            'firstName',
            'lastName',
            'email',
            'phone',
            'cellPhone',
            'visas',
            'country',
            'service',
            'serviceTypes',
            'migrateTo',
            'academicBackground',
            'timeExperience',
            'occupation',
            'annualIncome',
            'language',
            'formLink',
            'event',
            'imported',
            'utm',
            'refer',
            'send_mail'
        ];
    }

    public function collection()
    {
        return Lead::all();
    }
}
