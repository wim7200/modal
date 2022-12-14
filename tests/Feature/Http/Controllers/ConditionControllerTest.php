<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Condition;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ConditionController
 */
class ConditionControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $conditions = Condition::factory()->count(3)->create();

        $response = $this->get(route('condition.index'));

        $response->assertOk();
        $response->assertViewIs('condition.index');
        $response->assertViewHas('conditions');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('condition.create'));

        $response->assertOk();
        $response->assertViewIs('condition.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ConditionController::class,
            'store',
            \App\Http\Requests\ConditionStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $name = $this->faker->name;

        $response = $this->post(route('condition.store'), [
            'name' => $name,
        ]);

        $conditions = Condition::query()
            ->where('name', $name)
            ->get();
        $this->assertCount(1, $conditions);
        $condition = $conditions->first();

        $response->assertRedirect(route('condition.index'));
        $response->assertSessionHas('condition.id', $condition->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $condition = Condition::factory()->create();

        $response = $this->get(route('condition.show', $condition));

        $response->assertOk();
        $response->assertViewIs('condition.show');
        $response->assertViewHas('condition');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $condition = Condition::factory()->create();

        $response = $this->get(route('condition.edit', $condition));

        $response->assertOk();
        $response->assertViewIs('condition.edit');
        $response->assertViewHas('condition');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ConditionController::class,
            'update',
            \App\Http\Requests\ConditionUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $condition = Condition::factory()->create();
        $name = $this->faker->name;

        $response = $this->put(route('condition.update', $condition), [
            'name' => $name,
        ]);

        $condition->refresh();

        $response->assertRedirect(route('condition.index'));
        $response->assertSessionHas('condition.id', $condition->id);

        $this->assertEquals($name, $condition->name);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $condition = Condition::factory()->create();

        $response = $this->delete(route('condition.destroy', $condition));

        $response->assertRedirect(route('condition.index'));

        $this->assertDeleted($condition);
    }
}
