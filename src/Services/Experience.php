<?php

namespace AsaGick\Portfolio\Services;

use AsaGick\Portfolio\Models\Experience as ModelsExperience;
use Illuminate\Support\Facades\Request;

class Experience
{
    private $request;
    public function __construct()
    {
        $this->request = request();
    }

    public function rule($rule = null)
    {
        if (!is_null($rule))
            return $rule;
        else
            return [
                'title' => ['required'],
                'experience_type' => ['required', 'in:job,education,project,cource'],
                'description' => [],
                'location' => ['required'],
                'image_url' => ['required'],
                'start_at' => ['required'],
                'end_at' => ['required']
            ];
    }
    public function create()
    {
        $data = $this->request->validate($this->rule());

        $create = ModelsExperience::create($data);

        return $create;
    }

    public function edit(ModelsExperience $experience): ModelsExperience
    {
        return $experience;
    }

    public function update(ModelsExperience $experience)
    {
        $data = $this->request->validate($this->rule());

        $updated = $experience->update($data);

        return $updated;
    }

    public function delete(ModelsExperience $experience)
    {
        $deleted = $experience->delete();

        return $deleted;
    }

    public function all()
    {
        $experiences = ModelsExperience::all();

        return $experiences;
    }

    public function show(ModelsExperience $experience)
    {
        return $experience;
    }
}
