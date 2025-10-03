<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('thread.{threadId}', function () {
    return true;
});