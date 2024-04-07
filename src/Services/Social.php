<?php

namespace AsaGick\Portfolio\Services;

use App\Models\Social as AppModelsSocial;
use AsaGick\Portfolio\Helpers\Response;
use AsaGick\Portfolio\Models\Skill;
use AsaGick\Portfolio\Models\Social as ModelsSocial;
use Illuminate\Support\Facades\Request;

class Social
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
                'username'=>[''],
                'platform'=>[''],
                'logo_url'=>[''],
                'socialable_id'=>[''],
                'socialable_type'=>[''],
            ];
    }
    public function all()
    {
        $socials = ModelsSocial::query();
        if (Request::get('pg') >= 1) {
            $socials = $socials->paginate(10);
        } elseif (Request::get('pg') == 0 || !Request::has('pg')) {
            $socials = $socials->get();
        }

        return $socials;
    }

    public function show(ModelsSocial $social)
    {
        return $social;
    }


    public function edit(ModelsSocial $social)
    {
        return $social;
    }

    public function create()
    {
        $data = $this->request->validate($this->rule());

        $created = ModelsSocial::create($data);

        return $created;
    }

    public function update(ModelsSocial $social)
    {
        $validate_data = $this->request->validate($this->rule());

        $updated = $social->update($validate_data);
        return  $updated;
    }

    public function delete(ModelsSocial $social)
    {
        return $social->delete();
    }
}
