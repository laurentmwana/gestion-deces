<?php


namespace App\Validators;

use App\Models\Category;
use App\Table\CategoryTable;
use App\Table\Connection;
use App\Validator\AbstractValidator;

class CategorieValidator extends AbstractValidator {

    /**
     *
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        parent::__construct($data);
    }


    public function update (Category $categorie): array {

        if (!empty($this->data)) {
            $this->rule('empty', ['type', 'categorie', 'content']);
            $this->rule('regex', ['type', 'categorie'], "(^[a-z]+$)");
            $this->rule('minLenght', ['type', 'categorie'], 4);
            $this->rule('maxLenght', ['type', 'categorie'], 10);
            $this->rule('maxLenght', "content", 255);


            if ($this->has()) {
                $table = new CategoryTable(Connection::getPDO());
                if ($table->update()) {
                    # code...
                }
            }

            return $this->getErrors();
        }


        return [];
    }
}