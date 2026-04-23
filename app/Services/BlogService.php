<?php

namespace App\Services;

use League\CommonMark\GithubFlavoredMarkdownConverter;
use Symfony\Component\Yaml\Yaml;

class BlogService
{
    private string $blogPath;

    public function __construct()
    {
        $this->blogPath = resource_path('blog');
    }

    /** @return array<int, array<string, mixed>> */
    public function all(): array
    {
        $files = glob($this->blogPath.'/*.md') ?: [];

        $posts = array_map(function (string $file): array {
            $slug = basename($file, '.md');

            return $this->parseMeta($slug, (string) file_get_contents($file));
        }, $files);

        usort($posts, fn ($a, $b) => strcmp((string) $b['date'], (string) $a['date']));

        return $posts;
    }

    /** @return array<string, mixed>|null */
    public function find(string $slug): ?array
    {
        $path = $this->blogPath.'/'.$slug.'.md';

        if (! file_exists($path)) {
            return null;
        }

        return $this->parsePost($slug, (string) file_get_contents($path));
    }

    /** @return array<string, mixed> */
    private function parseMeta(string $slug, string $contents): array
    {
        [$frontmatter] = $this->split($contents);
        /** @var array<string, mixed> $meta */
        $meta = Yaml::parse($frontmatter) ?? [];

        return [
            'slug' => $slug,
            'title' => $meta['title'] ?? '',
            'description' => $meta['description'] ?? '',
            'date' => $meta['date'] ?? '',
            'updated_at' => $meta['updated_at'] ?? null,
            'category' => $meta['category'] ?? 'article',
            'author' => $meta['author'] ?? 'Papevi Team',
            'reading_time' => $meta['reading_time'] ?? null,
        ];
    }

    /** @return array<string, mixed> */
    private function parsePost(string $slug, string $contents): array
    {
        [$frontmatter, $body] = $this->split($contents);
        /** @var array<string, mixed> $meta */
        $meta = Yaml::parse($frontmatter) ?? [];

        $converter = new GithubFlavoredMarkdownConverter([
            'html_input' => 'escape',
            'allow_unsafe_links' => false,
        ]);

        $html = $converter->convert($body)->getContent();

        return [
            'slug' => $slug,
            'title' => $meta['title'] ?? '',
            'description' => $meta['description'] ?? '',
            'date' => $meta['date'] ?? '',
            'updated_at' => $meta['updated_at'] ?? null,
            'category' => $meta['category'] ?? 'article',
            'author' => $meta['author'] ?? 'Papevi Team',
            'reading_time' => $meta['reading_time'] ?? null,
            'html' => $html,
        ];
    }

    /**
     * Split file contents into [frontmatter_yaml, body_markdown].
     *
     * @return array{string, string}
     */
    private function split(string $contents): array
    {
        $parts = preg_split('/^---\s*$/m', $contents, 3);

        if (is_array($parts) && count($parts) === 3) {
            return [(string) $parts[1], ltrim((string) $parts[2])];
        }

        return ['', $contents];
    }
}
