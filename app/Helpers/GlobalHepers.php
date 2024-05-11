<?php
use Cviebrock\EloquentSluggable\Services\SlugService;
use Owenoj\LaravelGetId3\GetId3;

function setSidebarActive(array $routes): ?string
{
    foreach ($routes as $route) {
        if (request()->routeIs($route)) {
            return 'page-active';
        }
    }

    return null;
}

function adminSetSidebarActive(array $routes): ?string
{
    foreach ($routes as $route) {
        if (request()->routeIs($route)) {
            return 'active';
        }
    }

    return null;
}

function categoryMultiLevelOption($categories, $parentId = 0, $space = ' ', $selectedId = null, $currentCategoryId = null)
{
    foreach ($categories as $category) {
        if ($category->parent_id == $parentId) {
            $isSelected = ($selectedId != null && $selectedId == $category->id) || ($currentCategoryId != null && $currentCategoryId == $category->id);
            $selected = $isSelected ? 'selected' : '';
            echo '<option value="' . $category->id . '" ' . $selected . '>' . $space . $category->name . '</option>';
            categoryMultiLevelOption($categories, $category->id, $space . '--', $selectedId, $currentCategoryId);
        }
    }
}

function createSlug($model, $name)
{
    $slug = SlugService::createSlug($model, 'slug', $name);
    return $slug;
}

function getVideoDuration($videoPath)
{
    $getID3 = new GetId3($videoPath);
    $file = $getID3->extractInfo();
    // return $file['playtime_string'];
    return $file['playtime_seconds'];
}

function formatTime($time)
{
    $hours = floor($time / 3600);
    $minutes = floor(($time / 60) % 60);
    $seconds = $time % 60;

    return sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);
}