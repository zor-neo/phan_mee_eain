@extends('admin.layout.master');
@section('container')
    <div class="col-lg-9 admin-content">
                    <section class="container-lg py-5">
                        <div class="mb-4">
                            <h1 class="display-6 fw-bold">Admin Landing Overview</h1>
                            <p class="sw-muted">System health, moderation, author requests, messages, and analytics.
                            </p>
                        </div>
                        <div class="row g-3 mb-5">
                            <div class="col-md-6 col-xl">
                                <div class="sw-panel metric-card h-100">
                                    <span class="small text-uppercase sw-muted">users</span>
                                    <strong class="d-block">{{count($user)}}</strong>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl">
                                <div class="sw-panel metric-card h-100">
                                    <span class="small text-uppercase sw-muted">authors</span>
                                    <strong class="d-block">{{count($author)}}</strong>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl">
                                <div class="sw-panel metric-card h-100">
                                    <span class="small text-uppercase sw-muted">contents</span>
                                    <strong class="d-block">{{count($content)}}</strong>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl">
                                <div class="sw-panel metric-card h-100">
                                    <span class="small text-uppercase sw-muted">reports</span>
                                    <strong class="d-block ">{{count($report)}}</strong>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl">
                                <div class="sw-panel metric-card h-100">
                                    <span class="small text-uppercase sw-muted">requests</span>
                                    <strong class="d-block ">{{count($promote)}}</strong>
                                </div>
                            </div>
                        </div>
                        <div class="row g-4">
                            <div class="col-xl-8">
                                <div class="sw-panel mb-4">
                                    <div class="d-flex justify-content-between align-items-start gap-3 mb-3">
                                        <div>
                                            <h2 class="h4 fw-bold mb-1"><i class="bi bi-graph-up text-primary"></i>
                                                Whole Web Content Overview</h2>
                                            <p class="small sw-muted mb-0">Site-wide publishing volume, categories,
                                                author coverage, and latest activity.</p>
                                        </div>
                                        <span class="badge sw-badge">Admin-wide</span>
                                    </div>
                                    <div class="row g-3 mb-4">
                                        <div class="col-md-4">
                                            <div class="border rounded p-3 h-100"><span
                                                    class="small text-uppercase sw-muted">Total contents</span><strong
                                                    class="d-block fs-4">{{count($content)}}</strong></div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="border rounded p-3 h-100"><span
                                                    class="small text-uppercase sw-muted">Published</span><strong
                                                    class="d-block fs-4">{{count($content)}}</strong></div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="border rounded p-3 h-100"><span
                                                    class="small text-uppercase sw-muted">Hidden</span><strong
                                                    class="d-block fs-4">0</strong></div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="border rounded p-3 h-100"><span
                                                    class="small text-uppercase sw-muted">Categories</span><strong
                                                    class="d-block fs-4">{{count($category)}}</strong></div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="border rounded p-3 h-100"><span
                                                    class="small text-uppercase sw-muted">Authors with
                                                    content</span><strong class="d-block fs-4">{{count($AutWithCont)}}</strong></div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="border rounded p-3 h-100"><span
                                                    class="small text-uppercase sw-muted">User Suggestions</span><strong
                                                    class="d-block fs-5">{{count($suggest)}}</strong></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="sw-panel mb-4">
                                    <h2 class="h4 fw-bold"><i class="bi bi-person-plus text-primary me-2"></i> Users
                                        Requests </h2>
                                        <small class="ms-4">Promote to Auther</small> <br>
                                    <a href="#" class="fw-semibold mt-3">View all requests</a>
                                </div>
                                <div class="sw-panel">
                                    <h2 class="h4 fw-bold mb-3"><i class="bi bi-envelope text-primary"></i> Suggestion
                                    </h2>
                                    <div class="border-bottom pb-3 mb-3">
                                        <strong>View my verified achievement from Amazon Web Services Training and
                                            Certification!</strong>
                                        <p class="small sw-muted mb-0">From Maya Reader</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <script src="../assets/vendor/chart.umd.min.js"></script>
                    <script>
                        const siteChartColors = ['#465f8a', '#b1cafb', '#665881', '#565f71', '#a3bcec', '#d0bfee'];
                        const siteCategoryLegendPlugin = {
                            id: 'siteCategoryLegend',
                            afterUpdate(chart) {
                                const legend = document.getElementById('siteCategoryLegend');
                                if (!legend) return;

                                const items = chart.options.plugins.legend.labels.generateLabels(chart);
                                legend.innerHTML = items.map(item => `
                                <span class="sw-chart-legend-item">
                                    <span class="sw-chart-legend-swatch" style="background:${item.fillStyle}"></span>
                                    <span>${item.text}</span>
                                </span>
                                `).join('');
                            }
                        };
                        new Chart(document.getElementById('siteCategoryChart'), {
                            type: 'pie',
                            data: {
                                labels: ["Daily Challenges", "Historical Archives", "Logic & Reason", "Philosophy",
                                    "Scientific Method"
                                ],
                                datasets: [{
                                    data: [3, 3, 3, 4, 5],
                                    backgroundColor: siteChartColors
                                }]
                            },
                            plugins: [siteCategoryLegendPlugin],
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                                layout: {
                                    padding: {
                                        top: 4
                                    }
                                },
                                plugins: {
                                    legend: {
                                        display: false
                                    }
                                }
                            }
                        });
                        new Chart(document.getElementById('siteFrequencyChart'), {
                            type: 'line',
                            data: {
                                labels: ["2026-05-01", "2026-05-02", "2026-05-03", "2026-05-04", "2026-05-05", "2026-05-06",
                                    "2026-05-07", "2026-05-08", "2026-05-09", "2026-05-10", "2026-05-11", "2026-05-12",
                                    "2026-05-13", "2026-05-14", "2026-05-15"
                                ],
                                datasets: [{
                                    label: 'Posts',
                                    data: [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 2, 3, 1, 1, 1],
                                    borderColor: '#465f8a',
                                    backgroundColor: 'rgba(70,95,138,.14)',
                                    tension: .35,
                                    fill: true
                                }]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                                scales: {
                                    y: {
                                        beginAtZero: true,
                                        ticks: {
                                            precision: 0
                                        }
                                    }
                                }
                            }
                        });
                    </script>
                </div>
@endsection
