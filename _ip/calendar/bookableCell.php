<?php
 
 
class BookableCell
{
    /**
     * @var Booking
     */
    private $booking;
 
    private $currentURL;
 
    /**
     * BookableCell constructor.
     * @param $booking
     */
    public function __construct(Booking $booking)
    {
        $this->booking = $booking;
        $this->currentURL = htmlentities($_SERVER['REQUEST_URI']);
    }
 
    public function update(Calendar $cal)
    {
         $cal->tgl1= date('Y-m-d');
         $date= $cal->tgl1;
         $date2= $cal->getCurrentDate();
         $cek = $date > $date2;
        // $cal->tgl2= date('Y-m-d',strtotime($cal->getCurrentDate()));
        //  print_r($cek);die; 
        // print_r($cal); 
        // echo "<br/>";
        // print_r($cal->getCurrentDate());die;
    
        if ($this->isDateBooked($cal->getCurrentDate())) {
            // var_dump ($this->isDateBooked($cal->getCurrentDate())):`;
            if(($date > $date2)){
                return $cal->cellContent =
                $this->hiddenCell($cal->getCurrentDate());

             }else{
            return $cal->cellContent =
                $this->bookedCell($cal->getCurrentDate());
             }
        }
 
        if (!$this->isDateBooked($cal->getCurrentDate())) {
        
            if(($date > $date2)){
                return $cal->cellContent =
                $this->hiddenCell($cal->getCurrentDate());

             }else{
                 return $cal->cellContent =
                $this->openCell($cal->getCurrentDate());

             }
        }


        // //Data Hari Kemarin
        // if () {
        //     return $cal->cellContent =
        //         $this->openCell($cal->getCurrentDate());
        // }

    }
 
    public function routeActions()
    {
        if (isset($_POST['delete'])) {
            $this->deleteBooking($_POST['id']);
        }
 
        if (isset($_POST['add'])) {
            $this->addBooking($_POST['date']);
        }
    }
 
    private function openCell($date)
    {
        return '<div class="open">' . $this->bookingForm($date) . '</div>';
    }
    private function hiddenCell($date)
    {
        return '<div style="background:grey;">' . $this->hiddenForm($date) . '</div>';
    }
 
    private function bookedCell($date)
    {
        return '<div class="booked"><div style="font-size:10px; align:center;">' . $date .'</div>'. $this->deleteForm($this->bookingId($date)) . '</div>';
    }
 
    private function isDateBooked($date)
    {
        return in_array($date, $this->bookedDates());
    }
 
    private function bookedDates()
    {   
        return array_map(function ($record) {
            //  print_r($this->booking->index());
            
            return $record['booking_date'];
        }, $this->booking->index());
    }
 
    private function bookingId($date)
    {
        $booking = array_filter($this->booking->index(), function ($record) use ($date) {
            return $record['booking_date'] == $date;
        });
 
        $result = array_shift($booking);
 
        return $result['id'];
    }
 
    private function deleteBooking($id)
    {
        $this->booking->delete($id);
    }
 
    private function addBooking($date)
    {
        $date = new DateTimeImmutable($date);
        $this->booking->add($date);
    }
 
    private function bookingForm($date)
    {
        return
            '<form  method="post" action="' . $this->currentURL . '">' .
            '<div style="font-size:10px; align:center;">'.date('d', strtotime($date)).'</div>'.
            '<input type="hidden" name="add" />' .
            '<input type="hidden" name="date" value="' . $date . '" />' .
            '<input class="submit" type="submit" value="Book" />' .
            '</form>';
    }
 
    private function deleteForm($id)
    {
        return
            '<form onsubmit="return confirm(\'Are you sure to cancel?\');" method="post" action="' . $this->currentURL . '">' .
            '<input type="hidden" name="delete" />' .
            '<input type="hidden" name="id" value="' . $id . '" />' .
            '<input class="submit" type="submit" value="Delete" />' .
            '</form>';
    }
    private function HiddenForm($id)
    {
       return
            '<form onsubmit="return confirm(\'Are you sure to cancel?\');" method="post" action="' . $this->currentURL . '">' .
            '<input type="hidden" name="delete" />' .
            '<input type="hidden" name="id" value="' . $id . '" />' .
            '</form>';
    }
}