<?php 

namespace App\Repositories;

use App\Models\Bookings as BookingsModel;

class BookingRepository extends ModelAbstract implements ModelInterface
{
    /**
     * Instantiate model
     *
     * @param BookingsModel $booking
     */
    public function __construct(BookingsModel $booking)
    {
        parent::__construct($booking);
    }

    /**
     * Cancel booking
     * 
     * @param integer $id
     * @return void
     */
    public function cancel(int $id): void
    {
        $booking = $this->model::findOrFail($id);
        $booking->is_cancelled = 1;
        $booking->save();
    }
}
