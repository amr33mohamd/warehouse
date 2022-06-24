<?php

namespace App\Admin\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\StorageUnit;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ProductController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Product';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Product());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('img', __('Img'));
        $grid->column('category_id', __('Category'))->display(function($id){
            $category = Category::find($id);
            return $category->name;
        });
        $grid->column('storage_unit_id', __('Storage'))->display(function($id){
            $category = StorageUnit::find($id);
            return $category->name;
        });
        $grid->column('storage_unit_id', __('Storage unit id'));
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
        $show = new Show(Product::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('img', __('Img'));

        $show->field('category_id', __('Category id'));
        $show->field('storage_unit_id', __('Storage unit id'));
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
        $form = new Form(new Product());

        $form->text('name', __('Name'));
        $form->image('img', __('Img'));
        $form->select('category_id', __('Category'))->options(Category::all()->pluck('name', 'id'));
        $form->select('storage_unit_id', __('Storage unit'))->options(StorageUnit::all()->pluck('name', 'id'));
        return $form;
    }
}
