<?php

namespace App\Http\Controllers;

abstract class Controller
{
    protected string $flashMessageObj = '';

    protected function flashMessage(string $msg, string $type): array
    {
        return [
            'flas-message' => ['type' => $type, 'message' => $msg]
        ];
    }

    protected function createdFlashMessage()
    {
        return $this->flashMessage($this->flashMessageObj . ' created', 'success');
    }

    protected function updatedFlashMessage()
    {
        return $this->flashMessage($this->flashMessageObj . ' updated', 'success');
    }

    protected function deletedFlashMessage()
    {
        return $this->flashMessage($this->flashMessageObj . ' deleted', 'success');
    }
}
