<?php

namespace AsaGick\Portfolio\Services;

use AsaGick\Portfolio\Helpers\Response;
use AsaGick\Portfolio\Models\TeamMember as ModelsTeamMember;
use Illuminate\Support\Facades\Request;

class TeamMember
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
                'name' => 'required',
                'field' => 'required',
                'profile' => 'required',
                'desc' => 'required',
            ];
    }



    public function all()
    {
        $members = ModelsTeamMember::query();

        if ($this->request->has('sort')) {
            if ($this->request->get('sort') == 'newest') {
                $members->newest();
            }
            if ($this->request->get('sort') == 'oldest') {
                $members->oldest();
            }
            if ($this->request->get('sort') == 'oldest_up') {
                $members->oldestEdition();
            }
            if ($this->request->get('sort') == 'newest_up') {
                $members->newestEdition();
            }
        }

        if ($this->request->get('pg') >= 1) {
            $members->paginate(10);
        } elseif ($this->request->get('pg') == 0 || !$this->request->has('pg')) {
            $members->get();
        }

        return $members;
    }

    public function show(ModelsTeamMember $teamMember)
    {
        return $teamMember;
    }

    public function edit(ModelsTeamMember $teamMember)
    {
        return $teamMember;
    }

    public function create()
    {
        $data = $this->request->validate($this->rule());

        // Todo media for profile

        $created = ModelsTeamMember::create($data);

        return $created;
    }

    public function update(ModelsTeamMember $teamMember)
    {
        $inputs = $this->request->validate($this->rule());

        $updated = $teamMember->update($inputs);

        return $updated;
    }

    public function delete(ModelsTeamMember $teamMember)
    {
        return $teamMember->delete();
    }
}
