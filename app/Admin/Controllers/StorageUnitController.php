<?php

namespace App\Admin\Controllers;

use App\Models\StorageUnit;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class StorageUnitController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'StorageUnit';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new StorageUnit());

        $grid->column('id', __('Id'));
        $grid->column('x', __('X'));
        $grid->column('y', __('Y'));
        $grid->column('name', __('name'));

//        $grid->column('user_id', __('User id'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(StorageUnit::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('x', __('X'));
        $show->field('y', __('Y'));
        $show->field('name', __('name'));

//        $show->field('user_id', __('User id'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new StorageUnit());
        $form->text('name', __('name'));
        $form->number('x', __('X'));
        $form->number('y', __('Y'));

//        $form->number('user_id', __('User id'));

        return $form;
    }
}
