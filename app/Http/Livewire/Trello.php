<?php

namespace App\Http\Livewire;

use App\Models\TrelloCard;
use App\Models\TrelloGroup;
use Livewire\Component;

class Trello extends Component
{
    public $title;

    public $addGroupState = false;

    public $addCardState = "";

    protected $rules = [
        'title' => 'required',
    ];

    public function addGroup()
    {
        $this->addGroupState = true;
    }

    public function addTask($group_id)
    {
        $this->addCardState = $group_id;
    }

    public function deleteGroup($id)
    {
        TrelloGroup::destroy($id);
    }

    public function deleteCard($id)
    {
        TrelloCard::destroy($id);
    }

    public function save()
    {
        $data = $this->validate();

        if($this->addGroupState) {
            TrelloGroup::create($data);
        } else {
            $data["trello_group_id"] = $this->addCardState;

            TrelloCard::create($data);
        }

        $this->reset();
    }

    protected function sorting($order)
    {
        foreach ($order as $group) {
            TrelloGroup::where(['id' => $group["value"]])->update(['sort' => $group['order']]);

            if (isset($group["items"])) {
                foreach ($group["items"] as $card) {
                    TrelloCard::where(['id' => $card["value"]])->update([
                        'trello_group_id' => $group['value'],
                        'sort' => $card['order']
                    ]);
                }
            }
        }
    }

    public function updateOrder($order)
    {
        $this->sorting($order);
    }

    public function render()
    {
        $groups = TrelloGroup::orderBy("sort")->get();

        return view('livewire.trello', [
            'groups' => $groups,
        ]);
    }
}
