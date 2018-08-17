<?php 

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Repositories\BookingRepository;

class BookingController extends Controller
{
    /**
     * Booking validation rules
     *
     * @var array
     */
    private $rules = [
        'user_id' => 'required|integer',
        'car_id'  => 'required|integer'
    ];

    /**
     * Create booking
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Repositories\BookingRepository $booking
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, BookingRepository $booking)
    {
        try {
            $request->validate($this->rules);
            $booking->create($request->all());
            return response()->json([
                'status'  => 'success',
                'message' => __('booking.created')
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'error'  => $e->getMessage()
            ]);
        }
    }

    /**
     * Get all bookings
     *
     * @param  \App\Repositories\BookingRepository $booking
     * @return \Illuminate\Http\Response
     */
    public function all(BookingRepository $booking)
    {
        try {
            $data = $booking->all();
            return response()->json([
                'status' => 'success',
                'data'   => $data
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'error'  => $e->getMessage()
            ]);
        }
    }

    /**
     * Get specific booking using id
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function get($id, BookingRepository $booking)
    {
        try {
            $data = $booking->get($id);
            return response()->json([
                'status' => 'success',
                'data'   => $data
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'error'  => $e->getMessage()
            ]);
        }
    }

    /**
     * Cancel booking
     *
     * @param  int $id
     * @param  \App\Repositories\BookingRepository $booking
     * @return \Illuminate\Http\Response
     */
    public function cancel($id, BookingRepository $booking)
    {
        try {
            $booking->cancel($id);
            return response()->json([
                'status'  => 'success',
                'message' => __('booking.cancelled')
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'error'  => $e->getMessage()
            ]);
        }
    }
}
