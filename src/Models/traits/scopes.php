<?php

namespace AsaGick\Portfolio\Models\traits;

trait scopes
{
    public function scopeNewest($query)
    {
        return $query->orderBy("created_at", "desc");
    }

    public function scopeOldest($query)
    {
        return $query->orderBy("created_at", "asc");
    }

    public function scopeNewestEdition($query)
    {
        return $query->orderBy("updated_at", "desc");
    }

    public function scopeOldestEdition($query)
    {
        return $query->orderBy("updated_at", "asc");
    }
}
