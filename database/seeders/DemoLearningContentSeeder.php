<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Content;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DemoLearningContentSeeder extends Seeder
{
    /**
     * Seed demo authors, categories, and learning content for deployment demos.
     */
    public function run(): void
    {
        $authors = $this->authors();
        $categories = $this->categories();
        $authorIndex = 0;

        foreach ($this->contentPlan() as $categoryName => $items) {
            $category = $categories[$categoryName];

            foreach ($items as $item) {
                $author = $authors[$authorIndex % $authors->count()];
                $authorIndex++;

                Content::updateOrCreate(
                    [
                        'title' => $item['title'],
                        'category_id' => $category->id,
                    ],
                    [
                        'content' => $item['content'],
                        'role' => $item['role'],
                        'image' => 'image/logo.jpg',
                        'link' => null,
                        'user_id' => $author->id,
                    ]
                );
            }
        }
    }

    private function authors()
    {
        $fallbackPassword = config('demo.author_password');

        return collect([
            ['name' => 'Demo Author 1', 'email' => 'user1@gmail.com'],
            ['name' => 'Demo Author 2', 'email' => 'user2@gmail.com'],
            ['name' => 'Demo Author 3', 'email' => 'user3@gmail.com'],
        ])->map(function (array $author) use ($fallbackPassword) {
            $user = User::firstOrCreate(
                ['email' => $author['email']],
                [
                    'name' => $author['name'],
                    'password' => Hash::make($fallbackPassword ?: Str::random(32)),
                    'email_verified_at' => now(),
                ]
            );

            $user->forceFill([
                'name' => $author['name'],
                'role' => User::ROLE_AUTHOR,
                'email_verified_at' => $user->email_verified_at ?: now(),
            ])->save();

            return $user;
        });
    }

    private function categories(): array
    {
        Category::where('name', 'Language')->update(['name' => 'Languages']);
        Category::where('name', 'Science')->update(['name' => 'Sport Science']);

        return collect(array_keys($this->contentPlan()))
            ->mapWithKeys(function (string $name) {
                return [$name => Category::firstOrCreate(['name' => $name])];
            })
            ->all();
    }

    private function contentPlan(): array
    {
        return [
            'Languages' => [
                [
                    'role' => 'edu',
                    'title' => 'Building a Daily Language Practice Routine',
                    'content' => 'A strong language routine starts with a small daily habit. Learners should listen, read, speak, and write a little every day instead of waiting for one long study session. This lesson explains how to divide thirty minutes into vocabulary review, pronunciation practice, short reading, and one written sentence.',
                ],
                [
                    'role' => 'kno',
                    'title' => 'Why Mother Tongue Skills Support Second Language Learning',
                    'content' => 'Students who understand grammar, storytelling, and vocabulary in their first language often learn a second language with more confidence. Mother tongue literacy gives learners a foundation for comparing meaning, sentence patterns, and tone.',
                ],
                [
                    'role' => 'kno',
                    'title' => 'Practical Ways to Remember New Words',
                    'content' => 'Vocabulary grows faster when words are connected to real situations. Flashcards help, but example sentences, conversations, drawings, and spaced review make new words easier to remember and reuse.',
                ],
            ],
            'Technology' => [
                [
                    'role' => 'edu',
                    'title' => 'Understanding Technology as a Problem-Solving Tool',
                    'content' => 'Technology is not only about devices. It is a way to solve problems using tools, systems, and careful thinking. This lesson introduces learners to input, processing, output, feedback, and responsible digital habits.',
                ],
                [
                    'role' => 'kno',
                    'title' => 'How Smartphones Changed Everyday Learning',
                    'content' => 'Smartphones made learning more portable. Students can read, watch lessons, record notes, translate words, and communicate with teachers from almost anywhere, but they also need discipline to avoid distraction.',
                ],
                [
                    'role' => 'kno',
                    'title' => 'Digital Safety Basics for Students',
                    'content' => 'Good digital safety includes strong passwords, careful sharing, software updates, and checking links before opening them. These habits protect both personal information and school work.',
                ],
            ],
            'Myanmar Culture' => [
                [
                    'role' => 'edu',
                    'title' => 'Learning Myanmar Culture Through Festivals',
                    'content' => 'Myanmar festivals show how community, religion, seasons, and family life connect. Learners can study Thingyan, Thadingyut, and Tazaungdaing to understand generosity, respect, and shared celebration.',
                ],
                [
                    'role' => 'kno',
                    'title' => 'The Role of Respect in Myanmar Social Life',
                    'content' => 'Respect for parents, teachers, elders, and guests is a central part of Myanmar social behavior. It appears in language choices, greetings, seating, offering food, and everyday manners.',
                ],
                [
                    'role' => 'kno',
                    'title' => 'Traditional Arts as Cultural Memory',
                    'content' => 'Music, dance, puppetry, lacquerware, weaving, and storytelling preserve cultural memory. They help younger generations understand values, history, and local identity.',
                ],
            ],
            'Southeast Asian Economics' => [
                [
                    'role' => 'edu',
                    'title' => 'Introduction to Southeast Asian Trade',
                    'content' => 'Southeast Asia connects many markets through agriculture, manufacturing, tourism, shipping, and digital services. This lesson introduces imports, exports, comparative advantage, and regional cooperation.',
                ],
                [
                    'role' => 'kno',
                    'title' => 'Why Small Businesses Matter in Southeast Asia',
                    'content' => 'Small businesses provide jobs, local services, and family income across the region. They also help communities adapt quickly to new demand and changing economic conditions.',
                ],
                [
                    'role' => 'kno',
                    'title' => 'Tourism and Local Economies',
                    'content' => 'Tourism can support hotels, transport, food shops, guides, and craft sellers. Sustainable planning is important so local people benefit while culture and nature are protected.',
                ],
            ],
            'Sport Science' => [
                [
                    'role' => 'edu',
                    'title' => 'Basic Principles of Safe Training',
                    'content' => 'Safe training balances warm-up, skill practice, strength, rest, and recovery. Students should increase intensity gradually and pay attention to hydration, sleep, and pain signals.',
                ],
                [
                    'role' => 'kno',
                    'title' => 'How Nutrition Supports Athletic Performance',
                    'content' => 'Athletes need energy, protein, fluids, and micronutrients. Balanced meals help with endurance, muscle repair, concentration, and recovery after exercise.',
                ],
                [
                    'role' => 'kno',
                    'title' => 'The Mental Side of Sports',
                    'content' => 'Confidence, focus, teamwork, and emotional control affect performance. Goal setting and reflection help athletes improve beyond physical training alone.',
                ],
            ],
            'Computer Science' => [
                [
                    'role' => 'edu',
                    'title' => 'Algorithms for Beginners',
                    'content' => 'An algorithm is a clear set of steps for solving a problem. Learners can practice algorithms through daily tasks such as making tea, sorting books, or planning a route before writing code.',
                ],
                [
                    'role' => 'kno',
                    'title' => 'Why Data Structures Matter',
                    'content' => 'Data structures organize information so programs can work efficiently. Lists, stacks, queues, maps, and trees each fit different kinds of problems.',
                ],
                [
                    'role' => 'kno',
                    'title' => 'Debugging as a Learning Skill',
                    'content' => 'Debugging teaches patience and reasoning. Reading error messages, checking assumptions, testing small parts, and explaining code aloud can help students find mistakes faster.',
                ],
            ],
            'Myanmar Food Preparation' => [
                [
                    'role' => 'edu',
                    'title' => 'Preparing a Balanced Myanmar Meal',
                    'content' => 'A balanced Myanmar meal often combines rice, soup, vegetables, protein, and condiments. This lesson explains how flavor, texture, nutrition, and serving order work together.',
                ],
                [
                    'role' => 'kno',
                    'title' => 'Tea Leaf Salad Preparation Basics',
                    'content' => 'Lahpet thoke combines fermented tea leaves with crunchy beans, sesame, garlic oil, tomato, cabbage, and lime. The preparation balances bitter, sour, salty, and crunchy elements.',
                ],
                [
                    'role' => 'kno',
                    'title' => 'Food Safety in Home Cooking',
                    'content' => 'Clean hands, clean tools, safe water, proper storage, and fully cooked food reduce illness. Good preparation habits are as important as flavor.',
                ],
            ],
            'Tourism Guides' => [
                [
                    'role' => 'edu',
                    'title' => 'Planning a Responsible Travel Itinerary',
                    'content' => 'A good travel plan balances time, budget, transport, local rules, and rest. Responsible tourists respect communities, dress codes, nature, and cultural sites.',
                ],
                [
                    'role' => 'kno',
                    'title' => 'What Makes a Good Local Guide',
                    'content' => 'A good guide explains history clearly, keeps visitors safe, supports local businesses, and helps tourists behave respectfully in unfamiliar places.',
                ],
                [
                    'role' => 'kno',
                    'title' => 'Reading Maps and Travel Timetables',
                    'content' => 'Travel becomes easier when learners understand directions, landmarks, travel time, transfer points, and backup routes. Map reading is both a practical and planning skill.',
                ],
            ],
            'General Knowledge' => [
                [
                    'role' => 'edu',
                    'title' => 'How to Ask Better Questions',
                    'content' => 'Better questions lead to better learning. Students can improve by asking what, why, how, what evidence, and what alternative explanation might exist.',
                ],
                [
                    'role' => 'kno',
                    'title' => 'The Value of Curiosity in Daily Life',
                    'content' => 'Curiosity encourages people to observe, compare, read, ask, and test ideas. It turns ordinary experiences into opportunities for learning.',
                ],
                [
                    'role' => 'kno',
                    'title' => 'Simple Note-Taking Methods',
                    'content' => 'Good notes capture main ideas, examples, questions, and summaries. Learners can use bullet notes, mind maps, or question-and-answer notes depending on the subject.',
                ],
            ],
            'Study Skills' => [
                [
                    'role' => 'edu',
                    'title' => 'Planning a Weekly Study Schedule',
                    'content' => 'A useful study schedule divides large goals into small daily tasks. Learners should mix reading, practice, review, and rest so they can improve steadily without waiting until the last minute.',
                ],
                [
                    'role' => 'kno',
                    'title' => 'How Active Recall Improves Memory',
                    'content' => 'Active recall means trying to remember an answer before checking notes. It is stronger than rereading because it trains the brain to retrieve information when needed.',
                ],
                [
                    'role' => 'kno',
                    'title' => 'Using Breaks to Study Better',
                    'content' => 'Short breaks protect focus and reduce mental fatigue. A good break includes movement, water, or quiet rest instead of starting another distracting activity.',
                ],
            ],
        ];
    }
}
