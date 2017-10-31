<?php

namespace MVG\Events\Backend\System\Deposition;

use Illuminate\Queue\SerializesModels;

/**
 * Class DepositionUpdated.
 */
class DepositionUpdated
{
    use SerializesModels;

    /**
     * @var
     */
    public $deposition;
    
    /**
     * @param $deposition
     */
    public function __construct($deposition)
    {
        $this->deposition = $deposition;
    }
}