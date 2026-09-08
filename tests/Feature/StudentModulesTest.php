<?php

use App\Models\Section;
use App\Models\User;

it('renders the student dashboard for an approved student', function () {
    $section = Section::factory()->create();
    $student = User::factory()->create([
        'role' => 'student',
        'approval_status' => 'approved',
        'section_id' => $section->id,
    ]);

    $response = $this->actingAs($student)->get(route('student.dashboard'));

    $response->assertOk();
});

it('renders the learning modules page for an approved student', function () {
    $section = Section::factory()->create();
    $student = User::factory()->create([
        'role' => 'student',
        'approval_status' => 'approved',
        'section_id' => $section->id,
    ]);

    $response = $this->actingAs($student)->get(route('student.modules'));

    $response->assertOk();
});

it('blocks guests from the learning modules page', function () {
    $response = $this->get(route('student.modules'));

    $response->assertRedirect(route('student.login'));
});

it('labels the first Module 3 topic as Rational Functions', function () {
    $section = Section::factory()->create();
    $student = User::factory()->create([
        'role' => 'student',
        'approval_status' => 'approved',
        'section_id' => $section->id,
    ]);

    $response = $this->actingAs($student)->get(route('student.modules'));

    $response->assertOk()
        ->assertSee('data-topic="rat"><span class="topic-dot"></span>Rational Functions', false)
        ->assertSee('data-topic="rad"><span class="topic-dot"></span>Radical Equations', false)
        ->assertDontSee('Rational Equations');
});
