<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Client;
use App\Models\Rental;
use App\Models\Tool;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\RentalController
 */
class RentalControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $rentals = Rental::factory()->count(3)->create();

        $response = $this->get(route('rental.index'));

        $response->assertOk();
        $response->assertViewIs('rental.index');
        $response->assertViewHas('rentals');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('rental.create'));

        $response->assertOk();
        $response->assertViewIs('rental.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\RentalController::class,
            'store',
            \App\Http\Requests\RentalStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $status = $this->faker->word;
        $client = Client::factory()->create();
        $tool = Tool::factory()->create();

        $response = $this->post(route('rental.store'), [
            'status' => $status,
            'client_id' => $client->id,
            'tool_id' => $tool->id,
        ]);

        $rentals = Rental::query()
            ->where('status', $status)
            ->where('client_id', $client->id)
            ->where('tool_id', $tool->id)
            ->get();
        $this->assertCount(1, $rentals);
        $rental = $rentals->first();

        $response->assertRedirect(route('rental.index'));
        $response->assertSessionHas('rental.id', $rental->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $rental = Rental::factory()->create();

        $response = $this->get(route('rental.show', $rental));

        $response->assertOk();
        $response->assertViewIs('rental.show');
        $response->assertViewHas('rental');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $rental = Rental::factory()->create();

        $response = $this->get(route('rental.edit', $rental));

        $response->assertOk();
        $response->assertViewIs('rental.edit');
        $response->assertViewHas('rental');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\RentalController::class,
            'update',
            \App\Http\Requests\RentalUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $rental = Rental::factory()->create();
        $status = $this->faker->word;
        $client = Client::factory()->create();
        $tool = Tool::factory()->create();

        $response = $this->put(route('rental.update', $rental), [
            'status' => $status,
            'client_id' => $client->id,
            'tool_id' => $tool->id,
        ]);

        $rental->refresh();

        $response->assertRedirect(route('rental.index'));
        $response->assertSessionHas('rental.id', $rental->id);

        $this->assertEquals($status, $rental->status);
        $this->assertEquals($client->id, $rental->client_id);
        $this->assertEquals($tool->id, $rental->tool_id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $rental = Rental::factory()->create();

        $response = $this->delete(route('rental.destroy', $rental));

        $response->assertRedirect(route('rental.index'));

        $this->assertDeleted($rental);
    }
}
