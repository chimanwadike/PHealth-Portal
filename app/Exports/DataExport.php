<?php


namespace App\Exports;


use App\Model\Client;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class DataExport implements FromQuery, ShouldAutoSize, WithMapping, WithHeadings, WithColumnFormatting
{
    use Exportable;

    public function __construct(string $start_date, string $end_date, int $facility_id)
    {
        $this->start_date = $start_date;
        $this->end_date = $end_date;
        $this->facility_id = $facility_id;
    }

    public function query()
    {
        if($this->facility_id != 0){
            $query =  Client::query()->whereBetween('created_at', [$this->start_date, $this->end_date])
                ->where('facility_id', $this->facility_id);
        }else{
            $query =  Client::query()->whereBetween(DB::raw('date(created_at)'), [$this->start_date, $this->end_date]);
        }
        return $query;
    }

    public function map($row): array
    {
        return [
            //Date::dateTimeToExcel($row->created_at),
        $row->client_state->state_name,
            $row->client_lga->lga_name,
            $row->client_geo_code,
            $row->facility->name,
            $row->user->name,
            $row->testing_point,
            $row->stopped_at_pre_test == 1 ? "No" : "Yes",
            $row->firstname,
            $row->surname,
            $row->client_identifier,
            $row->age,
            $row->sex == "Select Gender" ? null : $row->sex,
            $row->phone_number,
            $row->care_giver_name,
            $row->hiv_test_date,
            $row->current_result,
            $row->previously_tested,
            $row->date_of_test,
            $row->previous_result,
            $row->session_type,
            $row->is_index_client,
            $row->index_client_id,
            $row->index_type,
            $row->post_tested_before_within_this_year,
            $row->client_village,
            $row->address,
            $row->address_2,
            $row->address_3,
            $row->marital_status,
            $row->employment_status,
            $row->education_level,
            $row->referral_state != null ? $row->referral_state->state_name : null,
            $row->referral_lga != null ? $row->referral_lga->lga_name : null,
            $row->refered_to != null ? $row->refered_to->name : null,
            Date::dateTimeToExcel(new \DateTime($row->referral_date)),
            Date::dateTimeToExcel(new \DateTime($row->form_date)),
            Date::dateTimeToExcel(new \DateTime($row->created_at)),
        ];
    }

    public function headings(): array
    {
        return [
            'State',
            'Lga',
            'Geo-Code',
            'Facility',
            'Tester',
            'Testing Point',
            'Eligible',
            'FirstName',
            'LastName',
            'Client Identifier',
            'Age',
            'Sex',
            'Phone',
            'Care Giver',
            'HIV Test Date',
            'HIV Current Result',
            'Previously Tested',
            'Previous HTS Date',
            'Previous Result',
            'Session Type',
            'Is Index Client',
            'Index Client ID',
            'Index Type',
            'Tested before within the year',
            'Client Village',
            'Address L 1',
            'Address L 2',
            'Address L 3',
            'Marital Status',
            'Employment Status',
            'Education Level',
            'Referred State',
            'Referred Lga',
            'Referred Facility',
            'Date Referred',
            'Form Date',
            'Sync Date'
        ];
    }

    /**
     * @return array
     */
    public function columnFormats(): array
    {
        return [
            'O' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'R' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'AI' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'AJ' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'AK' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }
}
