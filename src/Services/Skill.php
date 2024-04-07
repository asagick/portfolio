<?php

namespace AsaGick\Portfolio\Services;

use AsaGick\Portfolio\Models\Skill as ModelsSkill;
use GuzzleHttp\Promise\Create;

class Skill
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
                'skill' => ['required'],
                'fields' => ['required'],
                'percent' => ['required',],
                'logo' => ['required'],
            ];
    }
    public function all()
    {
        return ModelsSkill::all();
    }

    public function show(ModelsSkill $skill)
    {
        return $skill;
    }

    public function create()
    {
        $data = $this->request->validate($this->rule());

        $created = ModelsSkill::create($data);

        return $created;
    }

    public function edit(ModelsSkill $skill)
    {
        return $skill;
    }

    public function update(ModelsSkill $skill)
    {
        $data = $this->request->validate($this->rule());
        $update = $skill->update($data);
        return $update;
    }

    public function delete(ModelsSkill $skill)
    {
        $deleted = $skill->delete();

        return $deleted;
    }
}
