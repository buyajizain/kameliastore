<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Pre-Order Koleksi Mewah Branded - Kamelia Store</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,600&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Scripts & Tailwind/Alpine (For Sidebar & Drawer) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --primary: #C9A24D;
            --primary-dark: #9F7B30;
            --primary-light: #FBF8F1;
            --emerald-dark: #0A261F;
            --emerald: #059669;
            --emerald-hover: #047857;
            --dark: #0F172A;
            --text-main: #1E293B;
            --text-muted: #64748B;
            --bg-body: #F8FAFC;
            --border: #E2E8F0;
            --rose: #E11D48;
            --card-shadow: 0 4px 20px -2px rgba(0, 0, 0, 0.05);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, sans-serif;
        }

        html, body {
            overflow-x: hidden;
            width: 100%;
            max-width: 100vw;
        }

        body {
            background-color: var(--bg-body);
            color: var(--text-main);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .font-serif {
            font-family: 'Playfair Display', Georgia, serif;
        }

        /* Top Announcement & Admin Mode Toggle */
        .top-bar {
            background: var(--emerald-dark);
            color: #E7D5A8;
            font-size: 11px;
            font-weight: 700;
            padding: 8px 24px;
            letter-spacing: 0.8px;
            border-bottom: 1px solid rgba(201, 162, 77, 0.2);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
        }

        .admin-toggle {
            background: rgba(255, 255, 255, 0.12);
            color: #F8E8C8;
            border: 1px solid rgba(201, 162, 77, 0.4);
            font-size: 11px;
            font-weight: 700;
            padding: 4px 12px;
            border-radius: 9999px;
            cursor: pointer;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .admin-toggle:hover {
            background: rgba(255, 255, 255, 0.22);
        }

        .admin-toggle.active {
            background: var(--rose);
            color: #fff;
            border-color: var(--rose);
            box-shadow: 0 0 10px rgba(225, 29, 72, 0.4);
        }

        /* Header */
        header {
            position: sticky;
            top: 0;
            z-index: 50;
            background: rgba(255, 255, 255, 0.96);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid var(--border);
            padding: 14px 24px;
        }

        .header-container {
            max-width: 1320px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .logo-box {
            display: flex;
            align-items: center;
            gap: 12px;
            cursor: pointer;
            text-decoration: none;
        }

        .logo-icon {
            width: 42px;
            height: 42px;
            border-radius: 10px;
            background: linear-gradient(135deg, var(--emerald-dark), #14493D);
            color: #C9A24D;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 18px;
            box-shadow: 0 4px 10px rgba(10, 38, 31, 0.2);
            border: 1px solid rgba(201, 162, 77, 0.4);
        }

        .logo-text h1 {
            font-size: 20px;
            font-weight: 800;
            color: var(--emerald-dark);
            letter-spacing: 0.5px;
            line-height: 1.1;
        }

        .logo-text span {
            color: var(--primary);
        }

        .logo-text p {
            font-size: 10px;
            color: var(--text-muted);
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.8px;
        }

        .search-box {
            flex: 1;
            max-width: 480px;
            position: relative;
        }

        .search-input {
            width: 100%;
            padding: 11px 20px 11px 44px;
            border-radius: 9999px;
            border: 1px solid var(--border);
            background: #F1F5F9;
            font-size: 13px;
            font-weight: 500;
            outline: none;
            transition: all 0.2s;
        }

        .search-input:focus {
            background: #fff;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(201, 162, 77, 0.15);
        }

        .search-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 15px;
            color: var(--text-muted);
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .btn-nav-home {
            color: var(--text-main);
            text-decoration: none;
            font-size: 13px;
            font-weight: 700;
            padding: 8px 14px;
            border-radius: 8px;
            transition: 0.2s;
        }

        .btn-nav-home:hover {
            color: var(--emerald);
            background: #F1F5F9;
        }

        .btn-wa-header {
            background: var(--emerald);
            color: #fff;
            font-size: 13px;
            font-weight: 700;
            padding: 10px 20px;
            border-radius: 9999px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.2s;
            border: none;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(5, 150, 105, 0.2);
        }

        .btn-wa-header:hover {
            background: var(--emerald-hover);
            transform: translateY(-1px);
        }

        /* Hero */
        .hero {
            background: radial-gradient(circle at top, #14493D 0%, #0A261F 100%);
            color: #fff;
            text-align: center;
            padding: 50px 20px 42px;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23C9A24D' fill-opacity='0.04' fill-rule='evenodd'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/svg%3E");
            opacity: 0.6;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 820px;
            margin: 0 auto;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(201, 162, 77, 0.18);
            color: #F8E8C8;
            border: 1px solid rgba(201, 162, 77, 0.45);
            font-size: 11px;
            font-weight: 700;
            padding: 6px 16px;
            border-radius: 9999px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-bottom: 14px;
        }

        .hero h2 {
            font-size: 36px;
            font-weight: 700;
            color: #FFFFFF;
            line-height: 1.25;
            margin-bottom: 12px;
        }

        .hero p {
            font-size: 14px;
            color: #CBD5E1;
            line-height: 1.7;
            max-width: 680px;
            margin: 0 auto;
        }

        /* Main Container */
        .main-container {
            max-width: 1320px;
            margin: 0 auto;
            padding: 32px 20px;
            flex: 1;
            width: 100%;
            min-width: 0;
            overflow-x: hidden;
        }

        /* Toolbar */
        .toolbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            border-bottom: 1px solid var(--border);
            padding-bottom: 20px;
            margin-bottom: 28px;
            width: 100%;
            min-width: 0;
        }

        .brand-filters {
            display: flex;
            gap: 8px;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            padding-bottom: 8px;
            scrollbar-width: thin;
            flex: 1;
            min-width: 0;
            max-width: 100%;
        }

        .toolbar-sort {
            flex-shrink: 0;
        }

        .brand-pill {
            padding: 8px 18px;
            border-radius: 9999px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            border: 1px solid var(--border);
            background: #fff;
            color: var(--text-main);
            white-space: nowrap;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .brand-pill:hover {
            background: #F1F5F9;
            border-color: #CBD5E1;
        }

        .brand-pill.active {
            background: var(--emerald-dark);
            color: #fff;
            border-color: var(--emerald-dark);
            box-shadow: 0 4px 10px rgba(10, 38, 31, 0.15);
        }

        .brand-count {
            font-size: 11px;
            opacity: 0.75;
            background: rgba(0, 0, 0, 0.08);
            padding: 2px 7px;
            border-radius: 999px;
        }

        .brand-pill.active .brand-count {
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
        }

        .sort-select {
            padding: 9px 16px;
            border-radius: 12px;
            border: 1px solid var(--border);
            background: #fff;
            font-size: 12px;
            font-weight: 600;
            color: var(--text-main);
            outline: none;
            cursor: pointer;
            transition: 0.2s;
        }

        .sort-select:focus {
            border-color: var(--primary);
        }

        /* Product Grid */
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 22px;
        }

        .card {
            background: #fff;
            border-radius: 18px;
            border: 1px solid var(--border);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: var(--card-shadow);
            cursor: pointer;
            position: relative;
        }

        .card:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 30px -10px rgba(0, 0, 0, 0.08);
            border-color: #CBD5E1;
        }

        .card-img-wrap {
            position: relative;
            background: #F8FAFC;
            aspect-ratio: 1 / 1;
            overflow: hidden;
            border-bottom: 1px solid #F1F5F9;
        }

        .card-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .card:hover .card-img {
            transform: scale(1.06);
        }

        .badge-brand {
            position: absolute;
            top: 10px;
            left: 10px;
            background: rgba(10, 38, 31, 0.9);
            color: #E7D5A8;
            font-size: 10px;
            font-weight: 700;
            padding: 4px 10px;
            border-radius: 9999px;
            backdrop-filter: blur(6px);
            border: 1px solid rgba(201, 162, 77, 0.3);
            letter-spacing: 0.5px;
        }

        .badge-seller {
            position: absolute;
            bottom: 8px;
            left: 8px;
            right: 8px;
            background: rgba(255, 255, 255, 0.95);
            color: #0A261F;
            font-size: 10px;
            font-weight: 700;
            padding: 4px 8px;
            border-radius: 8px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            box-shadow: 0 2px 6px rgba(0,0,0,0.08);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .admin-card-actions {
            display: none;
            position: absolute;
            top: 8px;
            right: 8px;
            z-index: 15;
            gap: 4px;
        }

        .admin-edit-btn {
            background: var(--rose);
            color: #fff;
            font-size: 10px;
            font-weight: 800;
            padding: 4px 8px;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            box-shadow: 0 2px 6px rgba(225, 29, 72, 0.4);
            transition: 0.2s;
        }

        .admin-edit-btn:hover {
            background: #BE123C;
        }

        .admin-delete-btn {
            background: #1E293B;
            color: #fff;
            font-size: 10px;
            font-weight: 800;
            padding: 4px 8px;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
            transition: 0.2s;
        }

        .admin-delete-btn:hover {
            background: #E11D48;
        }

        .card-body {
            padding: 14px;
            display: flex;
            flex-direction: column;
            gap: 8px;
            flex: 1;
            justify-content: space-between;
        }

        .card-condition {
            font-size: 11px;
            color: #059669;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .card-title {
            font-size: 13px;
            font-weight: 700;
            color: var(--dark);
            line-height: 1.4;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .card-price-row {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            border-top: 1px solid #F1F5F9;
            padding-top: 10px;
            margin-top: 4px;
        }

        .retail-ref {
            font-size: 10px;
            color: #94A3B8;
            text-decoration: line-through;
            display: block;
            margin-bottom: 2px;
        }

        .selling-price {
            font-size: 16px;
            font-weight: 800;
            color: var(--emerald-dark);
            letter-spacing: -0.3px;
        }

        .btn-buy-wa {
            background: var(--emerald);
            color: #fff;
            padding: 8px 14px;
            border-radius: 9px;
            font-size: 12px;
            font-weight: 700;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 4px;
            transition: all 0.2s;
            border: none;
            cursor: pointer;
        }

        .btn-buy-wa:hover {
            background: var(--emerald-hover);
            transform: scale(1.04);
        }

        /* Modal Product Detail */
        .modal-overlay {
            display: none;
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(10, 38, 31, 0.7);
            backdrop-filter: blur(8px);
            z-index: 100;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .modal-overlay.active {
            display: flex;
        }

        .modal-card {
            background: #fff;
            border-radius: 24px;
            max-width: 860px;
            width: 100%;
            max-height: 90vh;
            overflow-y: auto;
            position: relative;
            box-shadow: 0 30px 60px -12px rgba(0, 0, 0, 0.4);
            display: flex;
            flex-direction: column;
        }

        @media (min-width: 768px) {
            .modal-card {
                flex-direction: row;
                max-height: 85vh;
            }
            .modal-left {
                width: 52%;
            }
            .modal-right {
                width: 48%;
            }
        }

        .modal-left {
            background: #F8FAFC;
            padding: 24px;
            display: flex;
            flex-direction: column;
            gap: 16px;
            align-items: center;
            border-right: 1px solid var(--border);
        }

        .modal-main-img-wrap {
            width: 100%;
            aspect-ratio: 1 / 1;
            background: #fff;
            border-radius: 16px;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid var(--border);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.04);
        }

        .modal-main-img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            display: block;
        }

        .gallery-thumbs {
            display: flex;
            gap: 8px;
            overflow-x: auto;
            width: 100%;
            padding: 4px 2px;
            scrollbar-width: thin;
        }

        .gallery-thumb {
            width: 54px;
            height: 54px;
            border-radius: 8px;
            object-fit: cover;
            cursor: pointer;
            border: 2px solid transparent;
            opacity: 0.65;
            transition: all 0.2s;
            flex-shrink: 0;
            background: #fff;
        }

        .gallery-thumb:hover, .gallery-thumb.active {
            opacity: 1;
            border-color: var(--primary);
            transform: scale(1.05);
        }

        .modal-right {
            padding: 28px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            gap: 18px;
            overflow-y: auto;
        }

        .close-btn {
            position: absolute;
            top: 16px;
            right: 16px;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: #F1F5F9;
            border: none;
            cursor: pointer;
            font-weight: 800;
            font-size: 16px;
            color: #64748B;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 10;
            transition: all 0.2s;
        }

        .close-btn:hover {
            background: #E2E8F0;
            color: #0F172A;
            transform: rotate(90deg);
        }

        .desc-box {
            font-size: 12px;
            color: #334155;
            line-height: 1.6;
            max-height: 140px;
            overflow-y: auto;
            background: #F8FAFC;
            padding: 12px;
            border-radius: 12px;
            border: 1px solid #E2E8F0;
            white-space: pre-line;
        }

        .empty-state {
            text-align: center;
            padding: 64px 20px;
            color: var(--text-muted);
            display: none;
        }

        /* Skeleton Loading Cards */
        .skeleton-card {
            background: #fff;
            border-radius: var(--radius-lg);
            border: 1px solid var(--border);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            box-shadow: var(--shadow-sm);
        }

        .skeleton-img {
            width: 100%;
            aspect-ratio: 1 / 1;
            background: linear-gradient(90deg, #f0f3f5 25%, #e2e8f0 50%, #f0f3f5 75%);
            background-size: 200% 100%;
            animation: shimmer 1.5s infinite;
        }

        .skeleton-body {
            padding: 16px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .skeleton-line {
            height: 12px;
            border-radius: 6px;
            background: linear-gradient(90deg, #f0f3f5 25%, #e2e8f0 50%, #f0f3f5 75%);
            background-size: 200% 100%;
            animation: shimmer 1.5s infinite;
        }

        .skeleton-line.short { width: 40%; }
        .skeleton-line.title { width: 85%; height: 16px; }
        .skeleton-line.price { width: 55%; height: 18px; margin-top: 6px; }

        @keyframes shimmer {
            0% { background-position: 200% 0; }
            100% { background-position: -200% 0; }
        }

        .load-more-wrap {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 36px 0 20px;
        }

        .btn-load-more {
            background: #fff;
            color: var(--emerald-dark);
            border: 1.5px solid var(--border);
            padding: 12px 28px;
            border-radius: 12px;
            font-size: 13px;
            font-weight: 800;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            box-shadow: var(--shadow-sm);
            transition: all 0.2s;
        }

        .btn-load-more:hover {
            border-color: var(--primary);
            background: #F8FAFC;
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        /* Footer */
        footer {
            background: #0A261F;
            color: #CBD5E1;
            padding: 36px 20px 24px;
            margin-top: 50px;
            border-top: 1px solid rgba(201, 162, 77, 0.2);
        }

        .footer-container {
            max-width: 1320px;
            margin: 0 auto;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding-bottom: 20px;
        }

        .footer-copy {
            max-width: 1320px;
            margin: 18px auto 0;
            text-align: center;
            font-size: 12px;
            color: #64748B;
        }

        /* Floating Concierge */
        .floating-wa {
            position: fixed;
            bottom: 28px;
            right: 28px;
            background: #059669;
            color: #fff;
            padding: 13px 20px;
            border-radius: 9999px;
            font-size: 13px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 10px 25px rgba(5, 150, 105, 0.35);
            text-decoration: none;
            z-index: 45;
            transition: all 0.3s;
        }

        .floating-wa:hover {
            background: #047857;
            transform: translateY(-3px);
        }

        /* ================= MOBILE RESPONSIVE MEDIA QUERIES ================= */
        @media (max-width: 992px) {
            .header-container {
                flex-direction: column;
                align-items: stretch;
                gap: 12px;
            }
            .header-top-row {
                display: flex;
                align-items: center;
                justify-content: space-between;
                width: 100%;
            }
            .search-box {
                max-width: 100%;
                width: 100%;
            }
            .hero h2 {
                font-size: 28px;
            }
            .toolbar {
                flex-direction: column;
                align-items: stretch;
                gap: 12px;
                width: 100%;
                min-width: 0;
            }
            .brand-filters {
                width: 100%;
                min-width: 0;
                max-width: 100%;
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }
            .toolbar-sort {
                width: 100%;
            }
            .sort-select {
                width: 100%;
            }
        }

        @media (max-width: 640px) {
            .top-bar {
                flex-direction: column;
                text-align: center;
                padding: 6px 12px;
                font-size: 10px;
                gap: 6px;
            }
            header {
                padding: 10px 14px;
            }
            .logo-icon {
                width: 36px;
                height: 36px;
                font-size: 15px;
            }
            .logo-text h1 {
                font-size: 17px;
            }
            .btn-nav-home {
                padding: 6px 10px;
                font-size: 11px;
            }
            .btn-wa-header span {
                display: none;
            }
            .btn-wa-header::after {
                content: '💬 CS';
            }
            .btn-wa-header {
                padding: 6px 12px;
                font-size: 11px;
            }
            .hero {
                padding: 32px 16px 28px;
            }
            .hero-badge {
                font-size: 9px;
                padding: 4px 10px;
                letter-spacing: 1px;
            }
            .hero h2 {
                font-size: 22px;
            }
            .hero p {
                font-size: 12px;
            }
            .main-container {
                padding: 16px 10px;
            }
            .product-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 10px;
            }
            .card {
                border-radius: 12px;
            }
            .card-body {
                padding: 10px;
            }
            .card-title {
                font-size: 12px;
                line-height: 1.3;
                height: 32px;
            }
            .badge-brand {
                font-size: 9px;
                padding: 2px 6px;
            }
            .badge-condition {
                font-size: 9px;
                padding: 2px 6px;
            }
            .selling-price {
                font-size: 13px;
            }
            .retail-ref {
                font-size: 9px;
            }
            .btn-buy-wa {
                padding: 6px 10px;
                font-size: 11px;
                border-radius: 6px;
            }
            .floating-wa {
                bottom: 16px;
                right: 16px;
                padding: 10px 16px;
                font-size: 11px;
            }
            .modal-card {
                border-radius: 16px;
                max-height: 94vh;
                margin: 10px;
            }
            .modal-left {
                padding: 16px;
            }
            .modal-right {
                padding: 16px;
            }
        }
    </style>

    <!-- Meta Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '695641838885394');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
        src="https://www.facebook.com/tr?id=695641838885394&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Meta Pixel Code -->
</head>
<body @if(Auth::check() && (Auth::user()->isAdmin() || Auth::user()->isStaff())) x-data="{ sidebarOpen: false }" class="bg-gray-50 flex min-h-screen text-gray-900" @endif>

    @if(Auth::check() && (Auth::user()->isAdmin() || Auth::user()->isStaff()))
        <!-- Sidebar Navigation (Selalu Aktif untuk Admin & Staff) -->
        @include('layouts.sidebar')
    @endif

    <!-- Main Content Area Wrapper -->
    <div class="{{ (Auth::check() && (Auth::user()->isAdmin() || Auth::user()->isStaff())) ? 'flex-1 min-w-0 flex flex-col md:pl-72 transition-all duration-300' : 'flex-1 min-w-0 flex flex-col' }}">

        <!-- Top Bar (Mode Kelola Produk Otomatis Aktif untuk Admin & Staff) -->
        <div class="top-bar">
            <span>✨ 100% AUTHENTIC PRE-ORDER BRANDED ITEMS • KAMELIA STORE EXCLUSIVE ✨</span>
            @if(Auth::check() && (Auth::user()->isAdmin() || Auth::user()->isStaff()))
                <button id="adminToggleBtn" class="admin-toggle active" onclick="toggleAdminMode()" title="Klik untuk mengaktifkan/menonaktifkan tombol edit pada kartu produk">
                    ✓ Mode Edit Produk Aktif
                </button>
            @endif
        </div>

        <!-- Header -->
        <header>
            <div class="header-container">
                <div class="header-top-row">
                    <div style="display: flex; align-items: center; gap: 8px;">
                        @if(Auth::check() && (Auth::user()->isAdmin() || Auth::user()->isStaff()))
                            <button @click="sidebarOpen = true" class="md:hidden p-2 rounded-xl text-gray-700 hover:bg-gray-100 transition" title="Buka Sidebar Admin/Staff">
                                <svg style="width: 24px; height: 24px; color: #0A261F;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                            </button>
                        @endif
                        <a href="{{ url('/') }}" class="logo-box">
                            <div class="logo-icon">KS</div>
                            <div class="logo-text">
                                <h1>KAMELIA <span>STORE</span></h1>
                                <p>Pre-Order Luxury</p>
                            </div>
                        </a>
                    </div>

                    <div class="header-actions">
                        <a href="{{ url('/') }}" class="btn-nav-home">Beranda</a>
                        @if(Auth::check())
                            <a href="{{ url('/dashboard') }}" class="btn-nav-home" style="color: #059669; font-weight: 800;">
                                @if(Auth::user()->isAdmin())
                                    👑 Portal Admin
                                @elseif(Auth::user()->isStaff())
                                    💬 Portal Staff
                                @else
                                    👤 Akun VIP
                                @endif
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="btn-nav-home">Sign In</a>
                        @endif
                        <button onclick="openAdminWA()" class="btn-wa-header">
                            <span>💬 Hubungi Concierge</span>
                        </button>
                    </div>
                </div>

                <div class="search-box">
                    <span class="search-icon">🔍</span>
                    <input type="text" id="searchInput" class="search-input" oninput="handleSearch()" placeholder="Cari Coach, Fossil, Marc Jacobs, Tory Burch, Prada, Kate Spade...">
                </div>
            </div>
        </header>

    <!-- Hero -->
    <section class="hero">
        <div class="hero-content">
            <span class="hero-badge">🌟 Koleksi Pre-Order Eksklusif Terkurasi</span>
            <h2 class="font-serif">Authentic Pre-Order Luxury Boutique</h2>
            <p>Koleksi tas, dompet, dan aksesoris branded original 100% pilihan terbaik melalui sistem Pre-Order resmi Kamelia Store dengan jaminan inspeksi fisik dan keaslian terpercaya.</p>
        </div>
    </section>

    <!-- Main Content -->
    <main class="main-container">
        
        <!-- Toolbar Brand Filters (All 8 Brands) -->
        <div class="toolbar">
            <div class="brand-filters">
                <button class="brand-pill active" id="btn-all" onclick="filterBrand('all')">
                    Semua Brand <span class="brand-count" id="c-all">{{ $brandCounts['all'] ?? 0 }}</span>
                </button>
                <button class="brand-pill" id="btn-Coach" onclick="filterBrand('Coach')">
                    Coach <span class="brand-count" id="c-Coach">{{ $brandCounts['Coach'] ?? 0 }}</span>
                </button>
                <button class="brand-pill" id="btn-Fossil" onclick="filterBrand('Fossil')">
                    Fossil <span class="brand-count" id="c-Fossil">{{ $brandCounts['Fossil'] ?? 0 }}</span>
                </button>
                <button class="brand-pill" id="btn-MarcJacobs" onclick="filterBrand('Marc Jacobs')">
                    Marc Jacobs <span class="brand-count" id="c-MarcJacobs">{{ $brandCounts['Marc Jacobs'] ?? 0 }}</span>
                </button>
                <button class="brand-pill" id="btn-ToryBurch" onclick="filterBrand('Tory Burch')">
                    Tory Burch <span class="brand-count" id="c-ToryBurch">{{ $brandCounts['Tory Burch'] ?? 0 }}</span>
                </button>
                <button class="brand-pill" id="btn-MichaelKors" onclick="filterBrand('Michael Kors')">
                    Michael Kors <span class="brand-count" id="c-MichaelKors">{{ $brandCounts['Michael Kors'] ?? 0 }}</span>
                </button>
                <button class="brand-pill" id="btn-KateSpade" onclick="filterBrand('Kate Spade')">
                    Kate Spade <span class="brand-count" id="c-KateSpade">{{ $brandCounts['Kate Spade'] ?? 0 }}</span>
                </button>
                <button class="brand-pill" id="btn-Aigner" onclick="filterBrand('Aigner')">
                    Aigner <span class="brand-count" id="c-Aigner">{{ $brandCounts['Aigner'] ?? 0 }}</span>
                </button>
                <button class="brand-pill" id="btn-Prada" onclick="filterBrand('Prada')">
                    Prada <span class="brand-count" id="c-Prada">{{ $brandCounts['Prada'] ?? 0 }}</span>
                </button>
            </div>

            <div class="toolbar-sort">
                <select id="sortSelect" class="sort-select" onchange="handleSort()">
                    <option value="newest">✨ Terbaru Masuk</option>
                    <option value="price-asc">💵 Harga Terendah</option>
                    <option value="price-desc">💎 Harga Tertinggi</option>
                    <option value="rating">⭐ Rating QC Tertinggi</option>
                </select>
            </div>
        </div>

        <!-- Product Grid -->
        <div id="productGrid" class="product-grid"></div>

        <!-- Load More / Infinite Scroll Area -->
        <div id="loadMoreWrap" class="load-more-wrap" style="display: none;">
            <button id="loadMoreBtn" class="btn-load-more" onclick="loadMoreProducts()">
                <span>Tampilkan Lebih Banyak Produk</span>
                <span id="loadMoreCount" style="font-size: 11px; background: #E2E8F0; padding: 2px 8px; border-radius: 999px;"></span>
            </button>
        </div>

        <!-- Empty State -->
        <div id="emptyState" class="empty-state">
            <h3 style="font-size: 18px; font-weight: 700; color: #1E293B;">Tidak ada produk ditemukan</h3>
            <p style="font-size: 13px; margin-top: 4px;">Coba gunakan kata kunci pencarian lain atau pilih brand berbeda.</p>
        </div>
    </main>

    <!-- Enhanced Product Detail Modal with Full Gallery -->
    <div id="detailModal" class="modal-overlay" onclick="if(event.target===this) closeModal()">
        <div class="modal-card">
            <button class="close-btn" onclick="closeModal()">✕</button>

            <!-- Left: Main Image + Multi-photo Gallery -->
            <div class="modal-left">
                <div class="modal-main-img-wrap">
                    <img id="modalMainImg" src="" alt="Detail Produk" class="modal-main-img">
                </div>
                <div id="modalGallery" class="gallery-thumbs"></div>
            </div>

            <!-- Right: Product Info & Order -->
            <div class="modal-right">
                <div style="display: flex; flex-direction: column; gap: 12px;">
                    <div>
                        <span id="modalBrand" style="font-size: 11px; font-weight: 800; text-transform: uppercase; background: #F8E8C8; color: #9F7B30; padding: 5px 12px; border-radius: 8px;"></span>
                    </div>

                    <h3 id="modalTitle" style="font-size: 18px; font-weight: 800; color: #0F172A; line-height: 1.4;"></h3>
                    <p id="modalCondition" style="font-size: 12px; color: #059669; font-weight: 700;"></p>
                    
                    <!-- Pricing Card -->
                    <div style="background: #F8FAFC; padding: 16px; border-radius: 14px; border: 1px solid #E2E8F0;">
                        <span id="modalRetailRef" style="font-size: 11px; color: #94A3B8; text-decoration: line-through; display: block; margin-bottom: 2px;"></span>
                        <span id="modalPrice" style="font-size: 24px; font-weight: 800; color: #0A261F;"></span>
                        <p style="font-size: 11px; color: #059669; font-weight: 700; margin-top: 4px;">✓ Jaminan 100% Originalitas Kamelia Store</p>
                    </div>

                    <!-- Seller Card -->
                    <div id="modalSeller" style="font-size: 11px; color: #334155; background: #fff; border: 1px solid #E2E8F0; padding: 12px; border-radius: 12px;"></div>

                    <!-- Description Box -->
                    <div id="modalDescWrap" style="display: flex; flex-direction: column; gap: 4px;">
                        <span style="font-size: 11px; font-weight: 700; color: #64748B;">Rincian & Keterangan Produk:</span>
                        <div id="modalDesc" class="desc-box"></div>
                    </div>

                    @if(Auth::check() && (Auth::user()->isAdmin() || Auth::user()->isStaff()))
                    <!-- Admin & Staff Order Fulfillment Box (Internal Only) -->
                    <div style="background: #FFF1F2; border: 1.5px dashed #F43F5E; border-radius: 14px; padding: 14px; margin-top: 4px;">
                        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 6px;">
                            <span style="font-size: 11px; font-weight: 800; color: #9F1239; text-transform: uppercase; letter-spacing: 0.5px; display: flex; align-items: center; gap: 4px;">
                                🔒 Link Asli Mercari JP (Order Fulfillment)
                            </span>
                            <span style="font-size: 10px; background: #E11D48; color: #fff; font-weight: 800; padding: 2px 8px; border-radius: 999px;">
                                @if(Auth::user()->isAdmin()) Admin Only @else Staff Only @endif
                            </span>
                        </div>
                        <p style="font-size: 11px; color: #881337; margin-bottom: 10px; line-height: 1.4;">
                            Harga Beli Asli Jepang: <strong id="modalMercariYen" style="color: #9F1239;">-</strong>. Klik tombol merah di bawah untuk langsung membuka & membeli barang di Mercari Jepang ketika customer memesan:
                        </p>
                        <a id="modalMercariBtn" href="#" target="_blank" rel="noopener noreferrer" 
                           style="background: #E11D48; color: #ffffff; text-decoration: none; font-size: 13px; font-weight: 700; padding: 11px 16px; border-radius: 10px; display: flex; align-items: center; justify-content: center; gap: 8px; box-shadow: 0 4px 12px rgba(225, 29, 72, 0.25); transition: 0.2s;">
                            <span>🛍️ Beli di Mercari Japan</span>
                            <span style="font-size: 15px;">&nearr;</span>
                        </a>

                        <!-- Quick Edit & Delete directly from Product Detail Modal -->
                        <div style="display: grid; grid-template-columns: 1fr auto; gap: 8px; margin-top: 8px;">
                            <button onclick="openAdminEditFromDetail()" style="background: #0A261F; color: #F5E8C7; border: 1px solid rgba(201, 162, 77, 0.4); font-size: 12px; font-weight: 800; padding: 10px 14px; border-radius: 9px; cursor: pointer; display: flex; align-items: center; justify-content: center; gap: 6px; transition: 0.2s;">
                                <span>✏️ Edit Judul, Harga & Keterangan</span>
                            </button>
                            <button onclick="deleteProductFromDetail()" style="background: #FFF1F2; color: #E11D48; border: 1px solid #FECDD3; font-size: 12px; font-weight: 800; padding: 10px 14px; border-radius: 9px; cursor: pointer; display: flex; align-items: center; gap: 4px;" title="Hapus Produk dari Katalog">
                                <span>🗑️ Hapus</span>
                            </button>
                        </div>
                    </div>
                    @endif
                </div>

                <div style="padding-top: 12px;">
                    <a id="modalWaBtn" href="#" target="_blank" style="background: #059669; color: #fff; font-weight: 700; font-size: 14px; text-decoration: none; padding: 14px; border-radius: 14px; display: flex; align-items: center; justify-content: center; gap: 8px; box-shadow: 0 4px 14px rgba(5, 150, 105, 0.25);">
                        <span>💬 Pesan Pre-Order via WhatsApp</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    @if(Auth::check() && (Auth::user()->isAdmin() || Auth::user()->isStaff()))
    <!-- Admin & Staff Edit Modal -->
    <div id="adminEditModal" class="modal-overlay" onclick="if(event.target===this) closeAdminModal()">
        <div class="modal-card" style="max-width: 520px; padding: 24px; border-radius: 20px;">
            <button class="close-btn" onclick="closeAdminModal()">✕</button>
            <div style="display: flex; flex-direction: column; gap: 14px; width: 100%;">
                <div style="display: flex; align-items: center; justify-content: space-between;">
                    <h3 style="font-size: 18px; font-weight: 800; color: #0F172A;">✏️ Edit Produk & Keterangan</h3>
                    <span style="font-size: 11px; background: #ECFDF5; color: #059669; font-weight: 800; padding: 2px 8px; border-radius: 999px;">
                        @if(Auth::user()->isAdmin()) Mode Admin @else Mode Staff @endif
                    </span>
                </div>
                <input type="hidden" id="editProductId">
                
                <div>
                    <label style="font-size: 12px; font-weight: 700; color: #475569; display: block; margin-bottom: 4px;">Judul Produk (Bahasa Indonesia):</label>
                    <input type="text" id="editProductTitle" style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #CBD5E1; font-size: 13px;">
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                    <div>
                        <label style="font-size: 12px; font-weight: 700; color: #475569; display: block; margin-bottom: 4px;">Harga Jual PO (Rp):</label>
                        <input type="number" id="editProductPrice" style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #CBD5E1; font-size: 13px;">
                    </div>
                    <div>
                        <label style="font-size: 12px; font-weight: 700; color: #475569; display: block; margin-bottom: 4px;">Harga Butik Ref (Rp):</label>
                        <input type="number" id="editProductRetail" style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #CBD5E1; font-size: 13px;">
                    </div>
                </div>

                <div>
                    <label style="font-size: 12px; font-weight: 700; color: #475569; display: block; margin-bottom: 4px;">Rincian & Keterangan Produk:</label>
                    <textarea id="editProductDesc" rows="4" style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #CBD5E1; font-size: 12px; line-height: 1.5; font-family: inherit; resize: vertical;" placeholder="Tuliskan rincian dan deskripsi produk..."></textarea>
                </div>

                <div style="display: flex; gap: 8px; margin-top: 4px;">
                    <button onclick="saveProductEdit()" style="flex: 1; background: #059669; color: #fff; font-weight: 700; border: none; padding: 12px; border-radius: 10px; cursor: pointer; display: flex; align-items: center; justify-content: center; gap: 6px;">
                        <span>💾 Simpan Perubahan</span>
                    </button>
                    <button onclick="deleteProductFromModal()" style="background: #FFF1F2; color: #E11D48; border: 1px solid #FECDD3; font-weight: 700; padding: 12px 14px; border-radius: 10px; cursor: pointer;" title="Hapus Produk Ini">
                        🗑️ Hapus
                    </button>
                    <button onclick="closeAdminModal()" style="background: #F1F5F9; color: #475569; font-weight: 700; border: none; padding: 12px 16px; border-radius: 10px; cursor: pointer;">
                        Batal
                    </button>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Floating WhatsApp Concierge -->
    <a href="#" onclick="openAdminWA(); return false;" class="floating-wa">
        <span>💬 Concierge Pre-Order</span>
    </a>

    <!-- Footer -->
    <footer>
        <div class="footer-container">
            <div>
                <h4 class="font-serif" style="font-size: 18px; color: #fff; font-weight: 700;">KAMELIA STORE</h4>
                <p style="font-size: 12px; color: #94A3B8; margin-top: 4px;">Luxury Authentic Sovereign &bull; Curated Pre-Order Boutique ({{ number_format($totalProducts) }}+ Items)</p>
            </div>
            <div style="display: flex; gap: 20px; font-size: 13px;">
                <a href="{{ url('/') }}" style="color: #CBD5E1; text-decoration: none;">Beranda</a>
                <a href="{{ url('/katalog') }}" style="color: #CBD5E1; text-decoration: none;">Koleksi Pre-Order</a>
                <a href="{{ url('/#authenticity') }}" style="color: #CBD5E1; text-decoration: none;">Verifikasi Fisik</a>
            </div>
        </div>
        <div class="footer-copy">
            &copy; {{ date('Y') }} Kamelia Store. All rights reserved.
        </div>
    </footer>

    </div><!-- /Main Content Area Wrapper -->

    <!-- Products Data and Interactive Logic -->
    <script>
        const CAN_EDIT = {{ (Auth::check() && (Auth::user()->isAdmin() || Auth::user()->isStaff())) ? 'true' : 'false' }};
        const IS_ADMIN = {{ (Auth::check() && Auth::user()->isAdmin()) ? 'true' : 'false' }};
        const WA_ADMIN_NUMBER = "628997919274"; // Nomor WhatsApp Resmi Toko Kamelia Store
        const ASSET_BASE = "{{ asset('') }}".replace(/\/+$/, '') + '/';

        function resolveImageUrl(img, fallbackUrl) {
            if (!img) return fallbackUrl || '';
            if (img.startsWith('http://') || img.startsWith('https://')) {
                // If it contains /kameliastore/public/catalog_images/ when served on port 8000
                if (img.includes('/catalog_images/')) {
                    const filename = img.split('/').pop();
                    return ASSET_BASE + 'catalog_images/' + filename;
                }
                return img;
            }
            const filename = img.split('/').pop();
            return ASSET_BASE + 'catalog_images/' + filename;
        }

        let rawProducts = [];
        let productsData = [];
        let customOverrides = JSON.parse(localStorage.getItem('kamelia_store_overrides') || '{}');
        let deletedIds = JSON.parse(localStorage.getItem('kamelia_deleted_products') || '[]');
        
        let activeBrand = 'all';
        let searchQuery = '';
        let currentSort = 'newest';
        let isAdminMode = CAN_EDIT; // DEFAULT LANGSUNG AKTIF UNTUK ADMIN & STAFF!
        let currentDetailProductId = null;

        // Progressive Pagination State
        const ITEMS_PER_PAGE = 36;
        let displayedCount = 0;
        let currentFilteredList = [];
        let isCatalogLoading = true;

        function formatRupiah(num) {
            return 'Rp ' + Number(num).toLocaleString('id-ID');
        }

        function toggleAdminMode() {
            if (!CAN_EDIT) return;
            isAdminMode = !isAdminMode;
            const btn = document.getElementById('adminToggleBtn');
            if (btn) {
                if (isAdminMode) {
                    btn.classList.add('active');
                    btn.innerText = "✓ Mode Edit Produk Aktif";
                } else {
                    btn.classList.remove('active');
                    btn.innerText = "⚙️ Mode Edit Produk (Mati)";
                }
            }
            document.querySelectorAll('.admin-card-actions').forEach(b => {
                b.style.display = (CAN_EDIT && isAdminMode) ? 'flex' : 'none';
            });
        }

        function updateCounts() {
            const elAll = document.getElementById('c-all');
            if (elAll) elAll.innerText = productsData.length;
            
            const brands = ['Coach', 'Fossil', 'Marc Jacobs', 'Tory Burch', 'Michael Kors', 'Kate Spade', 'Aigner', 'Prada'];
            brands.forEach(b => {
                const count = productsData.filter(p => p.brand && p.brand.toLowerCase() === b.toLowerCase()).length;
                const el = document.getElementById('c-' + b.replace(/\s+/g, ''));
                if (el) el.innerText = count;
            });
        }

        function openAdminWA() {
            if (typeof fbq === 'function') {
                fbq('track', 'Contact');
            }
            const msg = encodeURIComponent("Halo Concierge Kamelia Store, saya ingin konsultasi mengenai koleksi Pre-Order luxury branded.");
            window.open(`https://wa.me/${WA_ADMIN_NUMBER}?text=${msg}`, '_blank');
        }

        function createOrderWA(prod) {
            const text = `Halo Concierge Kamelia Store, saya berminat memesan Pre-Order (PO) produk ini:\n\n` +
                `*Item:* ${prod.title}\n` +
                `*Brand:* ${prod.brand}\n` +
                `*Kondisi:* ${prod.condition}\n` +
                `*Estimasi Harga PO:* ${prod.selling_idr_formatted}\n` +
                `*Kode Item:* #${prod.id}\n\n` +
                `Mohon info estimasi kedatangan & cara pemesanan. Terima kasih!`;
            return `https://wa.me/${WA_ADMIN_NUMBER}?text=${encodeURIComponent(text)}`;
        }

        function filterBrand(brand) {
            activeBrand = brand;
            document.querySelectorAll('.brand-pill').forEach(btn => btn.classList.remove('active'));
            const activeId = brand === 'all' ? 'btn-all' : 'btn-' + brand.replace(/\s+/g, '');
            const activeBtn = document.getElementById(activeId);
            if (activeBtn) activeBtn.classList.add('active');
            displayedCount = 0;
            renderProducts();
        }

        let searchDebounceTimer = null;
        function handleSearch() {
            clearTimeout(searchDebounceTimer);
            searchDebounceTimer = setTimeout(() => {
                searchQuery = document.getElementById('searchInput').value.toLowerCase().trim();
                displayedCount = 0;
                renderProducts();
            }, 120); // 120ms debounce untuk rasa responsif instan tanpa lag di keyboard
        }

        function handleSort() {
            currentSort = document.getElementById('sortSelect').value;
            displayedCount = 0;
            renderProducts();
        }

        function renderSkeletonPlaceholders(count = 12) {
            const grid = document.getElementById('productGrid');
            if (!grid) return;
            grid.innerHTML = Array.from({ length: count }).map(() => `
                <div class="skeleton-card">
                    <div class="skeleton-img"></div>
                    <div class="skeleton-body">
                        <div class="skeleton-line short"></div>
                        <div class="skeleton-line title"></div>
                        <div class="skeleton-line price"></div>
                    </div>
                </div>
            `).join('');
        }

        function createProductCardHtml(p) {
            const imgSrc = resolveImageUrl(p.image_local, p.image_url_remote);
            const waUrl = createOrderWA(p);
            const adminActionsDisplay = (CAN_EDIT && isAdminMode) ? 'flex' : 'none';
            const adminActionsHtml = CAN_EDIT ? `
                <div class="admin-card-actions" style="display: ${adminActionsDisplay};">
                    <button class="admin-edit-btn" onclick="event.stopPropagation(); openAdminEdit('${p.id}')" title="Edit Judul, Harga & Keterangan">✏️ Edit</button>
                    <button class="admin-delete-btn" onclick="event.stopPropagation(); confirmDeleteProduct('${p.id}')" title="Hapus Produk">🗑️ Hapus</button>
                </div>
            ` : '';

            return `
                <div class="card" onclick="openDetail('${p.id}')">
                    ${adminActionsHtml}
                    <div class="card-img-wrap">
                        <span class="badge-brand">${p.brand}</span>
                        <img src="${imgSrc}" alt="${p.title}" class="card-img" loading="lazy" onerror="this.src='${p.image_url_remote}'">
                        <div class="badge-seller">
                            <span>⭐ QC Passed (Kamelia)</span>
                            <span>Pre-Order</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div style="display: flex; flex-direction: column; gap: 6px;">
                            <span class="card-condition">${p.condition}</span>
                            <h3 class="card-title">${p.title}</h3>
                        </div>
                        <div class="card-price-row">
                            <div>
                                <span class="retail-ref">${p.retail_ref_formatted}</span>
                                <div class="selling-price">${p.selling_idr_formatted}</div>
                            </div>
                            <a href="${waUrl}" target="_blank" onclick="event.stopPropagation(); if(typeof fbq==='function') fbq('track', 'InitiateCheckout', {content_name: '${p.title.replace(/'/g, "\\'")}', content_category: '${p.brand}', value: ${p.selling_idr}, currency: 'IDR'});" class="btn-buy-wa">
                                <span>Pesan PO</span>
                            </a>
                        </div>
                    </div>
                </div>
            `;
        }

        function renderProducts(append = false) {
            const grid = document.getElementById('productGrid');
            const empty = document.getElementById('emptyState');
            const loadMoreWrap = document.getElementById('loadMoreWrap');
            const loadMoreCount = document.getElementById('loadMoreCount');
            if (!grid) return;

            if (!append) {
                // Filter and sort list from scratch
                const searchTokens = searchQuery ? searchQuery.split(/\s+/).filter(Boolean) : [];

                currentFilteredList = productsData.filter(p => {
                    const matchBrand = activeBrand === 'all' || (p._brandLower === activeBrand.toLowerCase());
                    if (!matchBrand) return false;

                    if (searchTokens.length === 0) return true;

                    // Match all search tokens against pre-compiled search blob
                    return searchTokens.every(token => p._searchBlob.includes(token));
                });

                if (currentSort === 'price-asc') {
                    currentFilteredList.sort((a, b) => a.selling_idr - b.selling_idr);
                } else if (currentSort === 'price-desc') {
                    currentFilteredList.sort((a, b) => b.selling_idr - a.selling_idr);
                } else if (currentSort === 'rating') {
                    currentFilteredList.sort((a, b) => {
                        const rA = a.seller ? (a.seller.ratings_count || 0) : 0;
                        const rB = b.seller ? (b.seller.ratings_count || 0) : 0;
                        return rB - rA;
                    });
                }

                displayedCount = 0;
                grid.innerHTML = '';
            }

            if (currentFilteredList.length === 0) {
                grid.innerHTML = '';
                empty.style.display = 'block';
                if (loadMoreWrap) loadMoreWrap.style.display = 'none';
                return;
            }

            empty.style.display = 'none';

            // Next chunk to render
            const nextBatch = currentFilteredList.slice(displayedCount, displayedCount + ITEMS_PER_PAGE);
            const cardsHtml = nextBatch.map(p => createProductCardHtml(p)).join('');

            if (append) {
                grid.insertAdjacentHTML('beforeend', cardsHtml);
            } else {
                grid.innerHTML = cardsHtml;
            }

            displayedCount += nextBatch.length;

            // Load More button state
            if (loadMoreWrap) {
                const remaining = currentFilteredList.length - displayedCount;
                if (remaining > 0) {
                    loadMoreWrap.style.display = 'flex';
                    if (loadMoreCount) loadMoreCount.innerText = `Sisa ${remaining.toLocaleString('id-ID')} item`;
                } else {
                    loadMoreWrap.style.display = 'none';
                }
            }
        }

        function loadMoreProducts() {
            renderProducts(true);
        }

        // Infinite Scroll Trigger
        window.addEventListener('scroll', () => {
            if (isCatalogLoading) return;
            const scrollPos = window.innerHeight + window.scrollY;
            const threshold = document.documentElement.offsetHeight - 600;
            if (scrollPos >= threshold && displayedCount < currentFilteredList.length) {
                loadMoreProducts();
            }
        });

        // Fast Asynchronous Product Fetching
        async function initCatalogData() {
            renderSkeletonPlaceholders(12);
            isCatalogLoading = true;

            try {
                const response = await fetch("{{ route('api.products') }}");
                if (!response.ok) throw new Error("Gagal memuat katalog");
                rawProducts = await response.json();

                // Merge custom edits, exclude deleted items, and pre-index search fields for instant filtering
                productsData = rawProducts
                    .filter(p => !deletedIds.includes(p.id))
                    .map(p => {
                        let item = p;
                        if (customOverrides[p.id]) {
                            item = { ...p, ...customOverrides[p.id] };
                        }
                        // Pre-compute lowercase search blob once for superfast O(1) matching
                        item._brandLower = (item.brand || '').toLowerCase();
                        item._searchBlob = `${item.title || ''} ${item.brand || ''} ${item.condition || ''} ${item.description || ''}`.toLowerCase();
                        return item;
                    });

                isCatalogLoading = false;
                updateCounts();
                renderProducts();
            } catch (err) {
                console.error("Error loading catalog:", err);
                isCatalogLoading = false;
                const grid = document.getElementById('productGrid');
                if (grid) {
                    grid.innerHTML = `
                        <div style="grid-column: 1 / -1; text-align: center; padding: 40px;">
                            <p style="color: #E11D48; font-weight: 700;">Gagal memuat katalog produk. Silakan coba segarkan halaman.</p>
                            <button onclick="initCatalogData()" style="margin-top: 12px; background: #0A261F; color: #fff; border: none; padding: 8px 18px; border-radius: 8px; cursor: pointer;">Segarkan Data</button>
                        </div>
                    `;
                }
            }
        }

        function openDetail(productId) {
            currentDetailProductId = productId;
            const prod = productsData.find(p => p.id === productId);
            if (!prod) return;

            document.getElementById('modalBrand').innerText = prod.brand;
            document.getElementById('modalTitle').innerText = prod.title;
            document.getElementById('modalCondition').innerText = prod.condition;
            document.getElementById('modalRetailRef').innerText = `Est. Butik / Retail: ${prod.retail_ref_formatted}`;
            document.getElementById('modalPrice').innerText = prod.selling_idr_formatted;
            
            document.getElementById('modalSeller').innerHTML = `
                🛡️ <strong>Verifikasi Kamelia:</strong> Unit lolos inspeksi fisik ketat tim kurasi • ⭐ Jaminan 100% Original Authentic
            `;

            document.getElementById('modalDesc').innerText = prod.description || "Koleksi Pre-Order Eksklusif Kamelia Store. Unit telah melewati inspeksi keaslian menyeluruh.";
            document.getElementById('modalWaBtn').href = createOrderWA(prod);
            document.getElementById('modalWaBtn').onclick = () => {
                if (typeof fbq === 'function') {
                    fbq('track', 'InitiateCheckout', {
                        content_name: prod.title,
                        content_category: prod.brand,
                        value: prod.selling_idr,
                        currency: 'IDR'
                    });
                }
            };

            // Set Admin & Staff Order Fulfillment Link
            const mercariBtn = document.getElementById('modalMercariBtn');
            if (mercariBtn) {
                const mercariUrl = prod.mercari_url || prod.url || `https://jp.mercari.com/item/${prod.id}`;
                mercariBtn.href = mercariUrl;
            }
            const mercariYenEl = document.getElementById('modalMercariYen');
            if (mercariYenEl) {
                mercariYenEl.innerText = prod.price_yen_raw ? `¥${Number(prod.price_yen_raw).toLocaleString('id-ID')}` : '-';
            }

            // Set main image
            const mainImg = document.getElementById('modalMainImg');
            const primaryImg = resolveImageUrl(prod.image_local, prod.image_url_remote || (prod.photos && prod.photos[0]) || '');
            mainImg.src = primaryImg;
            mainImg.onerror = () => { mainImg.src = prod.image_url_remote || (prod.photos && prod.photos[0]) || ''; };

            // Render photo gallery
            const gallery = document.getElementById('modalGallery');
            const photos = prod.photos && prod.photos.length > 0 ? prod.photos : [primaryImg];
            
            gallery.innerHTML = photos.map((photoUrl, idx) => `
                <img src="${photoUrl}" class="gallery-thumb ${idx === 0 ? 'active' : ''}" 
                     onclick="switchMainImg('${photoUrl}', this)" alt="Foto ${idx+1}">
            `).join('');

            document.getElementById('detailModal').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function openAdminEditFromDetail() {
            if (!CAN_EDIT || !currentDetailProductId) return;
            openAdminEdit(currentDetailProductId);
        }

        function deleteProductFromDetail() {
            if (!CAN_EDIT || !currentDetailProductId) return;
            confirmDeleteProduct(currentDetailProductId);
        }

        function switchMainImg(url, el) {
            document.getElementById('modalMainImg').src = url;
            document.querySelectorAll('.gallery-thumb').forEach(t => t.classList.remove('active'));
            el.classList.add('active');
        }

        function closeModal() {
            document.getElementById('detailModal').classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        function openAdminEdit(id) {
            if (!CAN_EDIT) return;
            const p = productsData.find(item => item.id === id);
            if (!p) return;
            document.getElementById('editProductId').value = p.id;
            document.getElementById('editProductTitle').value = p.title;
            document.getElementById('editProductPrice').value = p.selling_idr;
            document.getElementById('editProductRetail').value = p.retail_ref_idr || Math.round(p.selling_idr * 1.75);
            document.getElementById('editProductDesc').value = p.description || '';
            const modal = document.getElementById('adminEditModal');
            if (modal) modal.classList.add('active');
        }

        function closeAdminModal() {
            const modal = document.getElementById('adminEditModal');
            if (modal) modal.classList.remove('active');
        }

        function saveProductEdit() {
            if (!CAN_EDIT) return;
            const id = document.getElementById('editProductId').value;
            const newTitle = document.getElementById('editProductTitle').value.trim();
            const newPrice = parseInt(document.getElementById('editProductPrice').value) || 0;
            const newRetail = parseInt(document.getElementById('editProductRetail').value) || Math.round(newPrice * 1.75);
            const newDesc = document.getElementById('editProductDesc').value.trim();

            if (!customOverrides[id]) customOverrides[id] = {};
            customOverrides[id].title = newTitle;
            customOverrides[id].selling_idr = newPrice;
            customOverrides[id].selling_idr_formatted = formatRupiah(newPrice);
            customOverrides[id].retail_ref_idr = newRetail;
            customOverrides[id].retail_ref_formatted = formatRupiah(newRetail);
            customOverrides[id].description = newDesc;

            localStorage.setItem('kamelia_store_overrides', JSON.stringify(customOverrides));
            
            // Update in-memory productsData
            const pIdx = productsData.findIndex(item => item.id === id);
            if (pIdx !== -1) {
                productsData[pIdx] = { ...productsData[pIdx], ...customOverrides[id] };
            }

            closeAdminModal();
            renderProducts();
            alert("✓ Perubahan produk & keterangan berhasil disimpan!");
        }

        function confirmDeleteProduct(id) {
            if (!CAN_EDIT) return;
            const p = productsData.find(item => item.id === id);
            if (!p) return;
            if (confirm(`Apakah Anda yakin ingin menghapus produk "${p.title}" dari katalog toko?`)) {
                deleteProduct(id);
            }
        }

        function deleteProductFromModal() {
            if (!CAN_EDIT) return;
            const id = document.getElementById('editProductId').value;
            if (!id) return;
            confirmDeleteProduct(id);
        }

        function deleteProduct(id) {
            if (!CAN_EDIT) return;
            let delList = JSON.parse(localStorage.getItem('kamelia_deleted_products') || '[]');
            if (!delList.includes(id)) {
                delList.push(id);
                localStorage.setItem('kamelia_deleted_products', JSON.stringify(delList));
            }
            
            // Remove from productsData array
            productsData = productsData.filter(item => item.id !== id);
            closeAdminModal();
            closeModal();
            updateCounts();
            renderProducts();
            alert("✓ Produk berhasil dihapus dari katalog!");
        }

        // Close modal on Escape
        window.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                closeModal();
                closeAdminModal();
            }
        });

        // Start initialization immediately
        initCatalogData();
    </script>
</body>
</html>
