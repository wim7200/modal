<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Condition;
use App\Models\Kind;
use App\Models\Tool;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ToolController
 */
class ToolControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $tools = Tool::factory()->count(3)->create();

        $response = $this->get(route('tool.index'));

        $response->assertOk();
        $response->assertViewIs('tool.index');
        $response->assertViewHas('tools');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('tool.create'));

        $response->assertOk();
        $response->assertViewIs('tool.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ToolController::class,
            'store',
            \App\Http\Requests\ToolStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $name = $this->faker->name;
        $qr_code_tool = $this->faker->word;
        $due-time = $this->faker->dateTime();
        $kind = Kind::factory()->create();
        $condition = Condition::factory()->create();

        $response = $this->post(route('tool.store'), [
            'name' => $name,
            'qr_code_tool' => $qr_code_tool,
            'due-time' => $due-time,
            'kind_id' => $kind->id,
            'condition_id' => $condition->id,
        ]);

        $tools = Tool::query()
            ->where('name', $name)
            ->where('qr_code_tool', $qr_code_tool)
            ->where('due-time', $due-time)
            ->where('kind_id', $kind->id)
            ->where('condition_id', $condition->id)
            ->get();
        $this->assertCount(1, $tools);
        $tool = $tools->first();

        $response->assertRedirect(route('tool.index'));
        $response->assertSessionHas('tool.id', $tool->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $tool = Tool::factory()->create();

        $response = $this->get(route('tool.show', $tool));

        $response->assertOk();
        $response->assertViewIs('tool.show');
        $response->assertViewHas('tool');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $tool = Tool::factory()->create();

        $response = $this->get(route('tool.edit', $tool));

        $response->assertOk();
        $response->assertViewIs('tool.edit');
        $response->assertViewHas('tool');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ToolController::class,
            'update',
            \App\Http\Requests\ToolUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $tool = Tool::factory()->create();
        $name = $this->faker->name;
        $qr_code_tool = $this->faker->word;
        $due-time = $this->faker->dateTime();
        $kind = Kind::factory()->create();
        $condition = Condition::factory()->create();

        $response = $this->put(route('tool.update', $tool), [
            'name' => $name,
            'qr_code_tool' => $qr_code_tool,
            'due-time' => $due-time,
            'kind_id' => $kind->id,
            'condition_id' => $condition->id,
        ]);

        $tool->refresh();

        $response->assertRedirect(route('tool.index'));
        $response->assertSessionHas('tool.id', $tool->id);

        $this->assertEquals($name, $tool->name);
        $this->assertEquals($qr_code_tool, $tool->qr_code_tool);
        $this->assertEquals($due-time, $tool->due-time);
        $this->assertEquals($kind->id, $tool->kind_id);
        $this->assertEquals($condition->id, $tool->condition_id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $tool = Tool::factory()->create();

        $response = $this->delete(route('tool.destroy', $tool));

        $response->assertRedirect(route('tool.index'));

        $this->assertSoftDeleted($tool);
    }
}
