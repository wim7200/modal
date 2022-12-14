<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Kind;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\KindController
 */
class KindControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $kinds = Kind::factory()->count(3)->create();

        $response = $this->get(route('kind.index'));

        $response->assertOk();
        $response->assertViewIs('kind.index');
        $response->assertViewHas('kinds');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('kind.create'));

        $response->assertOk();
        $response->assertViewIs('kind.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\KindController::class,
            'store',
            \App\Http\Requests\KindStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $name = $this->faker->name;
        $img = $this->faker->word;
        $description = $this->faker->text;

        $response = $this->post(route('kind.store'), [
            'name' => $name,
            'img' => $img,
            'description' => $description,
        ]);

        $kinds = Kind::query()
            ->where('name', $name)
            ->where('img', $img)
            ->where('description', $description)
            ->get();
        $this->assertCount(1, $kinds);
        $kind = $kinds->first();

        $response->assertRedirect(route('kind.index'));
        $response->assertSessionHas('kind.id', $kind->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $kind = Kind::factory()->create();

        $response = $this->get(route('kind.show', $kind));

        $response->assertOk();
        $response->assertViewIs('kind.show');
        $response->assertViewHas('kind');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $kind = Kind::factory()->create();

        $response = $this->get(route('kind.edit', $kind));

        $response->assertOk();
        $response->assertViewIs('kind.edit');
        $response->assertViewHas('kind');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\KindController::class,
            'update',
            \App\Http\Requests\KindUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $kind = Kind::factory()->create();
        $name = $this->faker->name;
        $img = $this->faker->word;
        $description = $this->faker->text;

        $response = $this->put(route('kind.update', $kind), [
            'name' => $name,
            'img' => $img,
            'description' => $description,
        ]);

        $kind->refresh();

        $response->assertRedirect(route('kind.index'));
        $response->assertSessionHas('kind.id', $kind->id);

        $this->assertEquals($name, $kind->name);
        $this->assertEquals($img, $kind->img);
        $this->assertEquals($description, $kind->description);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $kind = Kind::factory()->create();

        $response = $this->delete(route('kind.destroy', $kind));

        $response->assertRedirect(route('kind.index'));

        $this->assertDeleted($kind);
    }
}
