<?php

namespace App\Repository;

use App\Models\Actor;

class ActorRepository
{
    public function getLatestActor() {
        return Actor::orderBy('createdAt','DESC')->paginate(20);
    }
    public function getActorById($id) {
        return Actor::findOrFail($id);
    }

}
