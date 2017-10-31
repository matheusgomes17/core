<?php

namespace MVG\Events\Backend\System\Deposition;

use Illuminate\Queue\SerializesModels;

/**
 * Class DepositionDeleted.
 */
class DepositionDeleted
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