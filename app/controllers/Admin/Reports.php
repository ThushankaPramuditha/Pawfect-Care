<?php

use Dompdf\Dompdf;

class Reports {

    use Controller;

    public function index(){
        $this->view('admin/reports');
    }
////////////////////////////////////////////////////////////////appointment_report////////////////////////////////////////////////////////////////
    public function generateAppointmentReport() {
        $from = $_POST['from'];
        $to = $_POST['to'];

        $appointmentModel = new AppointmentsModel();
        $appointmentCount = $appointmentModel->countAllAppointments($from, $to);
        $appointmentIncome = $appointmentModel->incomeFromAppointments($from, $to);
        $cancelledCount = $appointmentModel->countAppointmentsByStatus('cancelled', $from, $to);
        $finishedCount = $appointmentModel->countAppointmentsByStatus('finished', $from, $to);
        $incomeDetailsPerVet = $appointmentModel->incomeFromAppointmentsPerVet($from, $to);        

        $html = $this->prepareHTMLReportAppointment($appointmentCount, $appointmentIncome, $cancelledCount, $finishedCount, $from, $to, $incomeDetailsPerVet);
        // echo $html;
        // exit;

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream("Appointment report {$from} to {$to}.pdf", ["Attachment" => false]);
    }

    private function prepareHTMLReportAppointment($appointmentCount, $appointmentIncome, $cancelledCount, $finishedCount, $from, $to, $incomeDetailsPerVet) {
        $reportDate = date('Y-m-d');
        $logoPath = ROOT . '/assets/images/footer-logo.png'; // Ensure the path to your logo is correct
        $html = <<<HTML
        <html>
        <head>
            <style>
                body { font-family: 'Helvetica', sans-serif; font-size: 14px; padding: 20px; }
                header { text-align: center; margin-bottom: 20px; }
                h1 { text-align: center; font-size: 24px; color: #333; text-decoration:underline; }
                h3 { font-weight: normal; margin-top: 0px; }
                table { width: 100%; border-collapse: collapse; margin-bottom: 30px; }
                th, td { border: 1px solid #ddd; padding: 10px; text-align: left; font-size: 16px; }
                th { background-color: #f8f8f8; }
                
            </style>
        </head>
        <body>
            <h1>Appointment Booking Report</h1>
            <br><br>
     
            <h3><b>Period:</b> {$from} to {$to}</h3>
            <h2>Total Revenue</h2>

            
            <table>
                <thead>
                    <tr>
                        <th>Measure</th>
                        <th>Value</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>Total Appointments</td><td>{$appointmentCount}</td></tr>
                    <tr><td>Booking Revenue</td><td>{$appointmentIncome}</td></tr>
                    <tr><td>Cancelled Appointments</td><td>{$cancelledCount}</td></tr>
                    <tr><td>Finished Appointments</td><td>{$finishedCount}</td></tr>
                </tbody>
            </table>
            <section>
                <h2>Detailed Revenue by Veterinarian</h2>
                {$this->generateVetTables($incomeDetailsPerVet)}
            </section>
            <footer>
                <p>This report was generated on {$reportDate}.</p>
            </footer>
        </body>
        </html>
        HTML;
        return $html;
    }

    private function generateVetTables($incomeDetails) {
        $vetTables = '';
        foreach ($incomeDetails as $vet) {
            $vetTables .= <<<HTML
                <p><b>Vet ID:</b>      {$vet['vet_id']}</p>
                <p><b>Veterinarian:</b>      {$vet['vet_name']}</p>
            <table>
                <thead>
                    <tr>
                        <th>Measure</th>
                        <th>Value</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>Total Appointments</td><td>{$vet['total_appointments']}</td></tr>
                    <tr><td>Booking Revenue</td><td>{$vet['income']}</td></tr>
                </tbody>
            </table>
            HTML;
        }
        return $vetTables;
    }



    ////////////////////////////////////////////////////////////////daycare_report////////////////////////////////////////////////////////////////
    public function generateDaycareReport() {
        $from = $_POST['from'];
        $to = $_POST['to'];

        $bookingModel = new DaycarebookinguserModel();
        $bookingCount = $bookingModel->countAllDaycareBookings($from, $to);
        $declinedCount = $bookingModel->countDaycareBookingsByStatus('declined', $from, $to);
        //$finishedCount = $bookingModel->countDaycareBookingsByStatus('finished', $from, $to);

        $html = $this->prepareHTMLReportDaycareBooking($bookingCount, $declinedCount, $from, $to);
        // echo $html;
        // exit;

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream("Daycare Booking report {$from} to {$to}.pdf", ["Attachment" => false]);
    }

    private function prepareHTMLReportDaycareBooking($bookingCount, $declinedCount, $from, $to) {
        $reportDate = date('Y-m-d');
        $logoPath = ROOT . '/assets/images/footer-logo.png'; // Ensure the path to your logo is correct
        $html = <<<HTML
        <html>
        <head>
            <style>
                body { font-family: 'Helvetica', sans-serif; font-size: 14px; padding: 20px; }
                header { text-align: center; margin-bottom: 20px; }
                h1 { text-align: center; font-size: 24px; color: #333; text-decoration:underline; }
                h3 { font-weight: normal; margin-top: 0px; }
                table { width: 100%; border-collapse: collapse; margin-bottom: 30px; }
                th, td { border: 1px solid #ddd; padding: 10px; text-align: left; font-size: 16px; }
                th { background-color: #f8f8f8; }
                
            </style>
        </head>
        <body>
            <h1>Daycare Booking Report</h1>
            <br><br>
     
            <h3><b>Period:</b> {$from} to {$to}</h3>
            <h2>Total Bookings</h2>

            
            <table>
                <thead>
                    <tr>
                        <th>Measure</th>
                        <th>Value</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>Total Daycare Booking</td><td>{$bookingCount}</td></tr>
                    <tr><td>Declined Bookings</td><td>{$declinedCount}</td></tr>
                </tbody>
            </table>
            
            <footer>
                <p>This report was generated on {$reportDate}.</p>
            </footer>
        </body>
        </html>
        HTML;
        return $html;
    }


}
