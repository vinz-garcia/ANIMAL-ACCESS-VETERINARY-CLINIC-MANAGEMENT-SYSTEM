<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Appointments - Animal Access Veterinary Clinic</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>

        /* =====================================================
           NEW APPOINTMENT MODAL
        ===================================================== */

        body.appointments-page .appointment-modal {
            position: fixed !important;
            inset: 0 !important;
            display: none !important;
            align-items: center !important;
            justify-content: center !important;
            background: rgba(15, 45, 45, 0.38) !important;
            backdrop-filter: blur(5px) !important;
            z-index: 4000 !important;
        }

        body.appointments-page .appointment-modal.show {
            display: flex !important;
        }

        body.appointments-page .appointment-modal-content {
            width: 512px !important;
            max-width: calc(100% - 40px) !important;
            max-height: calc(100vh - 40px) !important;
            background: #ffffff !important;
            border-radius: 16px !important;
            overflow-y: auto !important;
            padding: 0 !important;
            box-shadow: 0 20px 50px rgba(0, 50, 50, 0.18) !important;
        }

        body.appointments-page .appointment-modal-header {
            height: 73px !important;
            padding: 0 24px !important;
            margin: 0 !important;
            display: flex !important;
            align-items: center !important;
            justify-content: space-between !important;
            border-bottom: 1px solid #edf1f1 !important;
        }

        body.appointments-page .appointment-modal-header h2 {
            margin: 0 !important;
            color: #123d3d !important;
            font-family: Georgia, "Times New Roman", serif !important;
            font-size: 20px !important;
            font-weight: 600 !important;
        }

        body.appointments-page .appointment-modal-close {
            width: 30px !important;
            height: 30px !important;
            border: none !important;
            background: transparent !important;
            color: #8ca0a0 !important;
            font-size: 19px !important;
            cursor: pointer !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
        }

        body.appointments-page .appointment-modal-close:hover {
            color: #0f7777 !important;
        }

        body.appointments-page .appointment-form {
            padding: 20px 24px !important;
        }

        body.appointments-page .appointment-form-row {
            display: grid !important;
            grid-template-columns: 1fr 1fr !important;
            gap: 16px !important;
            margin-bottom: 16px !important;
        }

        body.appointments-page .appointment-form-group {
            margin-bottom: 16px !important;
        }

        body.appointments-page .appointment-form-group.full-width {
            width: 100% !important;
        }

        body.appointments-page .appointment-form-group label {
            display: block !important;
            margin-bottom: 7px !important;
            color: #718080 !important;
            font-size: 11px !important;
            font-weight: 700 !important;
            letter-spacing: 0.2px !important;
        }

        body.appointments-page .appointment-form-group input,
        body.appointments-page .appointment-form-group select {
            width: 100% !important;
            height: 39px !important;
            padding: 0 12px !important;
            box-sizing: border-box !important;
            border: 1px solid #dbe3e3 !important;
            border-radius: 7px !important;
            background: #ffffff !important;
            color: #253b3b !important;
            font-family: Arial, Helvetica, sans-serif !important;
            font-size: 13px !important;
            outline: none !important;
        }

        body.appointments-page .appointment-form-group input::placeholder {
            color: #a1aaaa !important;
        }

        body.appointments-page .appointment-form-group input:focus,
        body.appointments-page .appointment-form-group select:focus {
            border-color: #56aaa7 !important;
            box-shadow: 0 0 0 2px rgba(15, 119, 119, 0.08) !important;
        }

        body.appointments-page .appointment-form-actions {
            display: grid !important;
            grid-template-columns: 1fr 1fr !important;
            gap: 12px !important;
            margin-top: 6px !important;
        }

        body.appointments-page .appointment-cancel-btn,
        body.appointments-page .appointment-save-btn {
            height: 42px !important;
            border-radius: 7px !important;
            font-family: Arial, Helvetica, sans-serif !important;
            font-size: 13px !important;
            font-weight: 600 !important;
            cursor: pointer !important;
        }

        body.appointments-page .appointment-cancel-btn {
            border: 1px solid #dbe3e3 !important;
            background: white !important;
            color: #657777 !important;
        }

        body.appointments-page .appointment-cancel-btn:hover {
            background: #f7f9f9 !important;
        }

        body.appointments-page .appointment-save-btn {
            border: none !important;
            background: #0f7777 !important;
            color: white !important;
        }

        body.appointments-page .appointment-save-btn:hover {
            background: #0b6969 !important;
        }


        /* =====================================================
           APPOINTMENTS PAGE
        ===================================================== */

        html,
        body {
            margin: 0 !important;
            padding: 0 !important;
            min-height: 100% !important;
        }

        body.appointments-page {
            min-height: 100vh !important;
            background: #faf9f6 !important;
            color: #263f3f !important;
            font-family: Arial, Helvetica, sans-serif !important;
            overflow-x: hidden !important;
        }


        /* =====================================================
           SIDEBAR
        ===================================================== */

        body.appointments-page .appointments-sidebar {
            position: fixed !important;
            top: 0 !important;
            left: 0 !important;
            width: 250px !important;
            height: 100vh !important;
            margin: 0 !important;
            padding: 0 !important;
            background: #063d3d !important;
            color: white !important;
            display: flex !important;
            flex-direction: column !important;
            z-index: 1000 !important;
            box-sizing: border-box !important;
        }

        body.appointments-page .appointments-logo-area {
            height: 116px !important;
            padding: 22px 24px !important;
            display: flex !important;
            align-items: center !important;
            gap: 12px !important;
            box-sizing: border-box !important;
            border-bottom: 1px solid rgba(255,255,255,.08) !important;
        }

        body.appointments-page .appointments-logo {
            width: 42px !important;
            height: 42px !important;
            border-radius: 10px !important;
            overflow: hidden !important;
            background: #d9f1eb !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            flex-shrink: 0 !important;
        }

        body.appointments-page .appointments-logo img {
            width: 38px !important;
            height: 38px !important;
            object-fit: contain !important;
        }

        body.appointments-page .appointments-clinic h2 {
            margin: 0 !important;
            color: white !important;
            font-size: 16px !important;
            line-height: 1.2 !important;
            font-weight: 700 !important;
        }

        body.appointments-page .appointments-clinic span {
            display: block !important;
            margin-top: 4px !important;
            color: #55d5c8 !important;
            font-size: 11px !important;
            line-height: 1.2 !important;
        }


        /* =====================================================
           NAVIGATION
        ===================================================== */

        body.appointments-page .appointments-nav {
            padding: 28px 12px !important;
            box-sizing: border-box !important;
        }

        body.appointments-page .appointments-nav a {
            height: 44px !important;
            margin-bottom: 6px !important;
            padding: 0 16px !important;
            border-radius: 8px !important;
            display: flex !important;
            align-items: center !important;
            gap: 13px !important;
            color: #b8d4d2 !important;
            text-decoration: none !important;
            font-size: 14px !important;
            line-height: 1 !important;
            box-sizing: border-box !important;
            transition: background .18s ease, color .18s ease !important;
        }

        body.appointments-page .appointments-nav a:hover {
            background: rgba(255,255,255,.07) !important;
            color: white !important;
        }

        body.appointments-page .appointments-nav a.active {
            background: #115858 !important;
            color: white !important;
            font-weight: 700 !important;
        }

        body.appointments-page .appointments-nav a span {
            width: 18px !important;
            text-align: center !important;
            font-size: 15px !important;
            flex-shrink: 0 !important;
        }


        /* =====================================================
           SIDEBAR USER
        ===================================================== */

        body.appointments-page .appointments-user {
            margin-top: auto !important;
            min-height: 64px !important;
            padding: 12px 22px !important;
            border-top: 1px solid rgba(255,255,255,.10) !important;
            display: flex !important;
            align-items: center !important;
            gap: 10px !important;
            box-sizing: border-box !important;
        }

        body.appointments-page .appointments-avatar {
            width: 34px !important;
            height: 34px !important;
            border-radius: 50% !important;
            background: #1aaeb3 !important;
            color: white !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            font-size: 13px !important;
            font-weight: 700 !important;
            flex-shrink: 0 !important;
        }

        body.appointments-page .appointments-user-info {
            flex: 1 !important;
            min-width: 0 !important;
        }

        body.appointments-page .appointments-user-info strong {
            display: block !important;
            color: white !important;
            font-size: 12px !important;
            line-height: 1.2 !important;
        }

        body.appointments-page .appointments-user-info small {
            display: block !important;
            margin-top: 3px !important;
            color: #20c4c8 !important;
            font-size: 10px !important;
            line-height: 1.2 !important;
        }

        body.appointments-page .logout-power-btn {
            width: 34px !important;
            height: 34px !important;
            padding: 0 !important;
            border: none !important;
            border-radius: 8px !important;
            background: transparent !important;
            color: #9bbab7 !important;
            font-size: 21px !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            cursor: pointer !important;
            flex-shrink: 0 !important;
        }

        body.appointments-page .logout-power-btn:hover {
            background: rgba(255,255,255,.10) !important;
            color: white !important;
        }


        /* =====================================================
           MAIN
        ===================================================== */

        body.appointments-page .appointments-main {
            position: relative !important;
            margin: 0 0 0 250px !important;
            padding: 0 !important;
            width: calc(100% - 250px) !important;
            min-height: 100vh !important;
            background: #faf9f6 !important;
            box-sizing: border-box !important;
        }


        /* =====================================================
           TOPBAR
        ===================================================== */

        body.appointments-page .appointments-topbar {
            width: 100% !important;
            height: 62px !important;
            margin: 0 !important;
            padding: 0 32px !important;
            background: white !important;
            border-bottom: 1px solid #e5eeee !important;
            display: flex !important;
            align-items: center !important;
            justify-content: space-between !important;
            box-sizing: border-box !important;
        }

        body.appointments-page .appointments-topbar h3 {
            margin: 0 !important;
            color: #173d3d !important;
            font-size: 14px !important;
            line-height: 1 !important;
            font-weight: 600 !important;
        }

        body.appointments-page .appointments-top-right {
            display: flex !important;
            align-items: center !important;
            gap: 17px !important;
        }


        /* =====================================================
           NOTIFICATION
        ===================================================== */

        body.appointments-page .notification-wrapper {
            position: relative !important;
            display: flex !important;
            align-items: center !important;
        }

        body.appointments-page .notification {
            position: relative !important;
            border: none !important;
            background: transparent !important;
            color: #173d3d !important;
            cursor: pointer !important;
            font-size: 20px !important;
            line-height: 1 !important;
            padding: 4px !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
        }

        body.appointments-page .notification-badge {
            position: absolute !important;
            top: -4px !important;
            right: -6px !important;
            min-width: 16px !important;
            height: 16px !important;
            padding: 0 4px !important;
            border-radius: 999px !important;
            background: #e85b5b !important;
            color: white !important;
            font-size: 9px !important;
            font-weight: 700 !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            box-sizing: border-box !important;
        }

        body.appointments-page .notification-dropdown {
            display: none !important;
            position: absolute !important;
            top: calc(100% + 10px) !important;
            right: 0 !important;
            width: 320px !important;
            background: white !important;
            border: 1px solid #dceeee !important;
            border-radius: 12px !important;
            box-shadow: 0 12px 30px rgba(0, 50, 50, .12) !important;
            z-index: 9999 !important;
            overflow: hidden !important;
        }

        body.appointments-page .notification-dropdown.show {
            display: block !important;
        }

        body.appointments-page .notification-header {
            display: flex !important;
            justify-content: space-between !important;
            align-items: center !important;
            padding: 14px 16px !important;
            border-bottom: 1px solid #edf3f3 !important;
        }

        body.appointments-page .notification-header strong {
            color: #075f5f !important;
            font-size: 13px !important;
        }

        body.appointments-page .notification-header span {
            color: #7c9292 !important;
            font-size: 10px !important;
        }

        body.appointments-page .notification-section-title {
            padding: 10px 16px 6px !important;
            color: #6b8282 !important;
            font-size: 10px !important;
            font-weight: 700 !important;
            text-transform: uppercase !important;
        }

        body.appointments-page .notification-item {
            display: flex !important;
            gap: 10px !important;
            padding: 11px 16px !important;
        }

        body.appointments-page .notification-item-icon {
            width: 30px !important;
            height: 30px !important;
            border-radius: 8px !important;
            background: #eefafa !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            flex-shrink: 0 !important;
        }

        body.appointments-page .notification-item strong {
            display: block !important;
            color: #174b4b !important;
            font-size: 11px !important;
        }

        body.appointments-page .notification-item small {
            display: block !important;
            margin-top: 3px !important;
            color: #7c9292 !important;
            font-size: 10px !important;
        }

        body.appointments-page .notification-empty {
            padding: 28px 20px !important;
            text-align: center !important;
            color: #819292 !important;
            font-size: 11px !important;
        }


        /* SIGN OUT */

        body.appointments-page .appointments-signout {
            border: 1px solid #dce5e5 !important;
            background: white !important;
            color: #718080 !important;
            border-radius: 7px !important;
            padding: 8px 14px !important;
            font-size: 13px !important;
            cursor: pointer !important;
        }


        /* =====================================================
           CONTENT
        ===================================================== */

        body.appointments-page .appointments-content {
            width: 100% !important;
            margin: 0 !important;
            padding: 32px !important;
            box-sizing: border-box !important;
        }

        body.appointments-page .appointments-title {
            display: flex !important;
            align-items: flex-start !important;
            justify-content: space-between !important;
            margin-bottom: 25px !important;
        }

        body.appointments-page .appointments-title h1 {
            margin: 0 0 5px !important;
            color: #123d3d !important;
            font-family: Georgia, "Times New Roman", serif !important;
            font-size: 34px !important;
            line-height: 1.1 !important;
            font-weight: 500 !important;
        }

        body.appointments-page .appointments-title p {
            margin: 0 !important;
            color: #687b7b !important;
            font-size: 13px !important;
            line-height: 1.4 !important;
        }

        body.appointments-page .new-appointment-btn {
            background: #0f7777 !important;
            color: white !important;
            border: none !important;
            border-radius: 8px !important;
            padding: 13px 20px !important;
            font-size: 14px !important;
            line-height: 1 !important;
            font-weight: 700 !important;
            cursor: pointer !important;
            white-space: nowrap !important;
            transition: background .18s ease !important;
        }

        body.appointments-page .new-appointment-btn:hover {
            background: #0c6868 !important;
        }


        /* =====================================================
           TABS
        ===================================================== */

        body.appointments-page .appointment-tabs {
            display: flex !important;
            gap: 4px !important;
            margin-bottom: 25px !important;
            background: #f1f3f2 !important;
            border-radius: 8px !important;
            width: fit-content !important;
            padding: 4px !important;
            box-sizing: border-box !important;
        }

        body.appointments-page .appointment-tab {
            border: none !important;
            background: transparent !important;
            color: #627575 !important;
            padding: 9px 18px !important;
            border-radius: 7px !important;
            font-size: 13px !important;
            line-height: 1 !important;
            cursor: pointer !important;
        }

        body.appointments-page .appointment-tab.active {
            background: white !important;
            color: #0b6565 !important;
            font-weight: 700 !important;
            box-shadow: 0 1px 4px rgba(0,50,50,.10) !important;
        }

        body.appointments-page .appointment-tools {
            display: none !important;
        }

        body.appointments-page #appointmentSearch {
            width: 100% !important;
            max-width: 430px !important;
            height: 46px !important;
            padding: 0 15px !important;
            box-sizing: border-box !important;
            border: 1px solid #d9e2e2 !important;
            border-radius: 8px !important;
            background: white !important;
        }


        /* =====================================================
           TABLE
        ===================================================== */

        body.appointments-page .appointment-table {
            width: 100% !important;
            background: white !important;
            border-radius: 12px !important;
            overflow-x: auto !important;
            border: 1px solid #edf1f1 !important;
            box-sizing: border-box !important;
        }

        body.appointments-page .appointment-table table {
            width: 100% !important;
            min-width: 980px !important;
            border-collapse: collapse !important;
            table-layout: auto !important;
        }

        body.appointments-page .appointment-table th {
            height: 45px !important;
            color: #849494 !important;
            font-size: 11px !important;
            font-weight: 700 !important;
            text-align: left !important;
            padding: 0 18px !important;
            border-bottom: 1px solid #edf0f0 !important;
            white-space: nowrap !important;
            box-sizing: border-box !important;
        }

        body.appointments-page .appointment-table td {
            height: 68px !important;
            color: #344d4d !important;
            font-size: 13px !important;
            padding: 12px 18px !important;
            border-bottom: 1px solid #eef2f2 !important;
            vertical-align: middle !important;
            box-sizing: border-box !important;
        }

        body.appointments-page .appointment-table tbody tr:last-child td {
            border-bottom: none !important;
        }

        body.appointments-page .appointment-table tbody tr:hover {
            background: #fbfdfd !important;
        }

        body.appointments-page .appointment-id {
            color: #8a9999 !important;
            font-size: 12px !important;
            white-space: nowrap !important;
        }

        body.appointments-page .appointment-table td:nth-child(2) strong {
            display: block !important;
            color: #075f67 !important;
            font-size: 13px !important;
            font-weight: 700 !important;
            line-height: 1.3 !important;
        }

        body.appointments-page .appointment-table td:nth-child(2) small {
            display: block !important;
            margin-top: 3px !important;
            color: #8a9999 !important;
            font-size: 10px !important;
            line-height: 1.2 !important;
        }

        body.appointments-page .appointment-table td:nth-child(3) strong {
            color: #193e3e !important;
            font-size: 13px !important;
            font-weight: 600 !important;
        }

        body.appointments-page .status {
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            min-width: 70px !important;
            height: 23px !important;
            padding: 0 11px !important;
            border-radius: 999px !important;
            font-size: 10px !important;
            font-weight: 700 !important;
            line-height: 1 !important;
            box-sizing: border-box !important;
        }

        body.appointments-page .status.confirmed {
            background: #d7f3f2 !important;
            color: #08706f !important;
        }

        body.appointments-page .status.pending {
            background: #fff0bf !important;
            color: #ad7200 !important;
        }

        body.appointments-page .status.cancelled {
            background: #fde1e1 !important;
            color: #c13f3f !important;
        }

        body.appointments-page .appointment-actions {
            display: flex !important;
            align-items: center !important;
            gap: 8px !important;
            white-space: nowrap !important;
        }

        body.appointments-page .edit-action {
            color: #087475 !important;
            text-decoration: none !important;
            font-size: 12px !important;
            font-weight: 600 !important;
        }

        body.appointments-page .edit-action:hover {
            text-decoration: underline !important;
        }

        body.appointments-page .action-divider {
            color: #d0dada !important;
            font-size: 12px !important;
        }

        body.appointments-page .delete-action {
            border: none !important;
            padding: 0 !important;
            background: transparent !important;
            color: #ef5555 !important;
            font-size: 12px !important;
            cursor: pointer !important;
        }

        body.appointments-page .delete-action:hover {
            text-decoration: underline !important;
        }


        /* =====================================================
           ADD APPOINTMENT MODAL
        ===================================================== */

        body.appointments-page .modal {
            position: fixed !important;
            inset: 0 !important;
            background: rgba(10, 45, 45, .38) !important;
            backdrop-filter: blur(6px) !important;
            -webkit-backdrop-filter: blur(6px) !important;
            display: none !important;
            align-items: center !important;
            justify-content: center !important;
            padding: 20px !important;
            z-index: 4000 !important;
            box-sizing: border-box !important;
        }

        body.appointments-page .modal.show {
            display: flex !important;
        }

        body.appointments-page .modal-content {
            width: 512px !important;
            max-width: 100% !important;
            max-height: calc(100vh - 40px) !important;
            overflow-y: auto !important;
            background: white !important;
            border-radius: 15px !important;
            box-shadow: 0 18px 50px rgba(0, 45, 45, .18) !important;
            padding: 0 !important;
            box-sizing: border-box !important;
        }

        body.appointments-page .modal-header {
            height: 73px !important;
            padding: 0 24px !important;
            border-bottom: 1px solid #edf0f0 !important;
            display: flex !important;
            align-items: center !important;
            justify-content: space-between !important;
            box-sizing: border-box !important;
        }

        body.appointments-page .modal-header h2 {
            margin: 0 !important;
            color: #123d3d !important;
            font-family: Georgia, "Times New Roman", serif !important;
            font-size: 20px !important;
            font-weight: 600 !important;
        }

        body.appointments-page .modal-header button {
            width: 28px !important;
            height: 28px !important;
            padding: 0 !important;
            border: none !important;
            background: transparent !important;
            color: #91a1a1 !important;
            font-size: 22px !important;
            line-height: 1 !important;
            cursor: pointer !important;
        }

        body.appointments-page .modal-header button:hover {
            color: #123d3d !important;
        }

        body.appointments-page #appointmentForm {
            padding: 20px 24px !important;
            box-sizing: border-box !important;
        }

        body.appointments-page #appointmentForm label {
            display: block !important;
            margin: 0 0 7px !important;
            color: #718080 !important;
            font-size: 11px !important;
            font-weight: 700 !important;
            text-transform: uppercase !important;
            letter-spacing: .2px !important;
        }

        body.appointments-page #appointmentForm input,
        body.appointments-page #appointmentForm select {
            width: 100% !important;
            height: 39px !important;
            margin: 0 0 16px !important;
            padding: 0 12px !important;
            border: 1px solid #dce4e4 !important;
            border-radius: 7px !important;
            background: white !important;
            color: #263838 !important;
            font-family: Arial, Helvetica, sans-serif !important;
            font-size: 13px !important;
            outline: none !important;
            box-sizing: border-box !important;
        }

        body.appointments-page #appointmentForm input:focus,
        body.appointments-page #appointmentForm select:focus {
            border-color: #55aaa8 !important;
            box-shadow: 0 0 0 2px rgba(55, 160, 155, .10) !important;
        }

        body.appointments-page #appointmentForm input::placeholder {
            color: #9ba6a6 !important;
        }

        body.appointments-page #appointmentForm .primary-btn {
            width: 100% !important;
            height: 42px !important;
            margin-top: 4px !important;
            border: none !important;
            border-radius: 7px !important;
            background: #0f7777 !important;
            color: white !important;
            font-size: 13px !important;
            font-weight: 700 !important;
            cursor: pointer !important;
        }

        body.appointments-page #appointmentForm .primary-btn:hover {
            background: #0c6868 !important;
        }


        /* =====================================================
           LOGOUT MODAL
        ===================================================== */

        body.appointments-page .logout-modal {
            position: fixed !important;
            inset: 0 !important;
            background: rgba(5,35,35,.50) !important;
            display: none !important;
            align-items: center !important;
            justify-content: center !important;
            z-index: 5000 !important;
        }

        body.appointments-page .logout-modal.show {
            display: flex !important;
        }

        body.appointments-page .logout-modal-content {
            width: 380px !important;
            max-width: calc(100% - 40px) !important;
            background: white !important;
            border-radius: 14px !important;
            padding: 30px !important;
            text-align: center !important;
            box-sizing: border-box !important;
        }

        body.appointments-page .logout-icon {
            width: 52px !important;
            height: 52px !important;
            margin: 0 auto 16px !important;
            border-radius: 50% !important;
            background: #e8f5f3 !important;
            color: #0f7777 !important;
            font-size: 27px !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
        }

        body.appointments-page .logout-modal-content h2 {
            margin: 0 !important;
            color: #123d3d !important;
            font-family: Georgia, "Times New Roman", serif !important;
            font-size: 24px !important;
        }

        body.appointments-page .logout-modal-content p {
            margin: 9px 0 24px !important;
            color: #718080 !important;
            font-size: 13px !important;
        }

        body.appointments-page .logout-modal-actions {
            display: flex !important;
            justify-content: center !important;
            gap: 10px !important;
        }

        body.appointments-page .logout-cancel-btn,
        body.appointments-page .logout-confirm-btn {
            min-width: 100px !important;
            height: 42px !important;
            border-radius: 7px !important;
            padding: 0 18px !important;
            font-size: 13px !important;
            font-weight: 600 !important;
            cursor: pointer !important;
        }

        body.appointments-page .logout-cancel-btn {
            border: 1px solid #d8e2e2 !important;
            background: white !important;
            color: #667878 !important;
        }

        body.appointments-page .logout-confirm-btn {
            border: none !important;
            background: #0f7777 !important;
            color: white !important;
        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 900px) {

            body.appointments-page .appointments-sidebar {
                width: 220px !important;
            }

            body.appointments-page .appointments-main {
                margin-left: 220px !important;
                width: calc(100% - 220px) !important;
            }

            body.appointments-page .appointments-content {
                padding: 25px !important;
            }

            body.appointments-page .appointments-title h1 {
                font-size: 30px !important;
            }

        }

        @media (max-width: 700px) {

            body.appointments-page .appointments-sidebar {
                width: 210px !important;
            }

            body.appointments-page .appointments-main {
                margin-left: 210px !important;
                width: calc(100% - 210px) !important;
            }

            body.appointments-page .appointments-topbar {
                padding: 0 20px !important;
            }

            body.appointments-page .appointments-content {
                padding: 22px !important;
            }

            body.appointments-page .appointments-title {
                gap: 15px !important;
            }

            body.appointments-page .appointments-title h1 {
                font-size: 27px !important;
            }

            body.appointments-page .new-appointment-btn {
                padding: 11px 15px !important;
                font-size: 12px !important;
            }

        }

        @media (max-width: 560px) {

            body.appointments-page .appointments-sidebar {
                width: 190px !important;
            }

            body.appointments-page .appointments-main {
                margin-left: 190px !important;
                width: calc(100% - 190px) !important;
            }

            body.appointments-page .appointments-logo-area {
                padding-left: 16px !important;
                padding-right: 16px !important;
            }

            body.appointments-page .appointments-nav {
                padding-left: 8px !important;
                padding-right: 8px !important;
            }

            body.appointments-page .appointments-nav a {
                padding-left: 12px !important;
                padding-right: 12px !important;
            }

            body.appointments-page .appointments-user {
                padding-left: 14px !important;
                padding-right: 14px !important;
            }

        }

    </style>

</head>


<body class="appointments-page">


    <!-- =====================================================
         SIDEBAR
    ====================================================== -->

    <aside class="appointments-sidebar">

        <div class="appointments-logo-area">

            <div class="appointments-logo">

                <img
                    src="{{ asset('images/animal-access-logo.jpg') }}"
                    alt="Animal Access Veterinary Clinic Logo"
                >

            </div>

            <div class="appointments-clinic">

                <h2>Animal Access</h2>

                <span>Veterinary Clinic</span>

            </div>

        </div>


        <nav class="appointments-nav">

            <a href="/dashboard">

                <span>▣</span>

                Dashboard

            </a>


            <a href="/appointments" class="active">

                <span>▦</span>

                Appointments

            </a>


            <a href="/grooming">

                <span>✂</span>

                Grooming

            </a>


            <a href="/pets">

                <span>🐾</span>

                Pet Records

            </a>


            <a href="/customers">

                <span>♙</span>

                Customers

            </a>

        </nav>


        <div class="appointments-user">

            <div class="appointments-avatar">
                A
            </div>

            <div class="appointments-user-info">

                <strong>Admin</strong>

                <small>Administrator</small>

            </div>


            <button
                type="button"
                class="logout-power-btn"
                id="logoutPowerBtn"
                title="Sign out"
            >
                ⏻
            </button>

        </div>

    </aside>



    <!-- =====================================================
         MAIN
    ====================================================== -->

    <main class="appointments-main">


        <!-- TOPBAR -->

        <header class="appointments-topbar">

            <h3>
                Appointments
            </h3>


            <div class="appointments-top-right">

                <x-notification />

                <button
                    type="button"
                    class="appointments-signout"
                    id="topSignoutBtn"
                >
                    Sign out
                </button>

            </div>

        </header>



        <!-- CONTENT -->

        <section class="appointments-content">


            <div class="appointments-title">

                <div>

                    <h1>
                        Appointments
                    </h1>

                    <p>
                        {{ now()->format('F j, Y') }}
                        — {{ $appointments->count() }} total
                    </p>

                </div>


                <button
                    type="button"
                    class="new-appointment-btn"
                    id="addAppointmentBtn"
                >
                    + New Appointment
                </button>

            </div>



            <!-- TABS -->

            <div class="appointment-tabs">

                <button
                    type="button"
                    class="appointment-tab active"
                    data-status="all"
                >
                    All
                </button>

                <button
                    type="button"
                    class="appointment-tab"
                    data-status="confirmed"
                >
                    Confirmed
                </button>

                <button
                    type="button"
                    class="appointment-tab"
                    data-status="pending"
                >
                    Pending
                </button>

                <button
                    type="button"
                    class="appointment-tab"
                    data-status="cancelled"
                >
                    Cancelled
                </button>

            </div>



            <!-- SEARCH -->

            <div class="appointment-tools">

                <input
                    type="text"
                    id="appointmentSearch"
                    placeholder="Search pet or customer..."
                >

            </div>



            <!-- TABLE -->

            <div class="appointment-table">

                <table>

                    <thead>

                        <tr>

                            <th>ID</th>
                            <th>TIME</th>
                            <th>PET</th>
                            <th>OWNER</th>
                            <th>SERVICE</th>
                            <th>VETERINARIAN</th>
                            <th>STATUS</th>
                            <th>ACTIONS</th>

                        </tr>

                    </thead>


                    <tbody id="appointmentTableBody">

                        @forelse($appointments as $appointment)

                            <tr
                                data-status="{{ strtolower($appointment->status) }}"
                            >

                                <td>

                                    <span class="appointment-id">

                                        A-{{
                                            str_pad(
                                                $appointment->id,
                                                4,
                                                '0',
                                                STR_PAD_LEFT
                                            )
                                        }}

                                    </span>

                                </td>


                                <td>

                                    <strong>

                                        {{
                                            \Carbon\Carbon::parse(
                                                $appointment->appointment_time
                                            )->format('g:i A')
                                        }}

                                    </strong>

                                    <small>

                                        {{
                                            \Carbon\Carbon::parse(
                                                $appointment->appointment_date
                                            )->format('M j, Y')
                                        }}

                                    </small>

                                </td>


                                <td>

                                    <strong>
                                        {{ $appointment->pet_name }}
                                    </strong>

                                </td>


                                <td>
                                    {{ $appointment->customer_name }}
                                </td>


                                <td>
                                    {{ $appointment->service }}
                                </td>


                                <td>
                                    {{ $appointment->veterinarian ?? '—' }}
                                </td>


                                <td>

                                    <span
                                        class="status {{ strtolower($appointment->status) }}"
                                    >
                                        {{ $appointment->status }}
                                    </span>

                                </td>


                                <td>

                                    <div class="appointment-actions">

                                        <a
                                            href="{{ route('appointments.edit', $appointment->id) }}"
                                            class="edit-action"
                                        >
                                            Edit
                                        </a>


                                        <span class="action-divider">
                                            |
                                        </span>


                                        <form
                                            action="{{ route('appointments.destroy', $appointment->id) }}"
                                            method="POST"
                                            style="display:inline;"
                                        >

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="delete-action"
                                                onclick="return confirm('Are you sure you want to delete this appointment?')"
                                            >
                                                Delete
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="8"
                                    style="text-align:center; padding:40px;"
                                >
                                    No appointments found.
                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


        </section>

    </main>



    <!-- =====================================================
         ADD APPOINTMENT MODAL
    ====================================================== -->

    <div
        class="modal appointment-modal"
        id="appointmentModal"
    >

        <div class="modal-content appointment-modal-content">

            <div class="modal-header appointment-modal-header">

                <h2>
                    New Appointment
                </h2>

                <button
                    type="button"
                    id="closeModal"
                    class="appointment-modal-close"
                >
                    ×
                </button>

            </div>


            <form
                id="appointmentForm"
                method="POST"
                action="{{ route('appointments.store') }}"
                class="appointment-form"
            >

                @csrf


                <!-- PET OWNER -->

                <div class="appointment-form-group full-width">

                    <label for="customerName">
                        PET OWNER
                    </label>

                    <select
                        id="customerName"
                        name="customer_name"
                        required
                    >

                        <option value="">
                            Select owner ...
                        </option>

                        @if(isset($customers) && $customers->count())

                            @foreach($customers as $customer)

                                <option value="{{ $customer->name }}">
                                    {{ $customer->name }}
                                </option>

                            @endforeach

                        @elseif(isset($appointments))

                            @foreach(
                                $appointments
                                    ->pluck('customer_name')
                                    ->filter()
                                    ->unique()
                                as $customerName
                            )

                                <option value="{{ $customerName }}">
                                    {{ $customerName }}
                                </option>

                            @endforeach

                        @endif

                    </select>

                </div>


                <!-- PET NAME + BREED -->

                <div class="appointment-form-row">

                    <div class="appointment-form-group">

                        <label for="petName">
                            PET NAME
                        </label>

                        <input
                            type="text"
                            id="petName"
                            name="pet_name"
                            placeholder="e.g. Coco"
                            required
                        >

                    </div>


                    <div class="appointment-form-group">

                        <label for="breed">
                            BREED
                        </label>

                        <input
                            type="text"
                            id="breed"
                            name="breed"
                            placeholder="e.g. Shih Tzu"
                        >

                    </div>

                </div>


                <!-- TIME + SERVICE -->

                <div class="appointment-form-row">

                    <div class="appointment-form-group">

                        <label for="appointmentTime">
                            TIME
                        </label>

                        <select
                            id="appointmentTime"
                            name="appointment_time"
                            required
                        >

                            <option value="09:00">
                                9:00 AM
                            </option>

                            <option value="10:00">
                                10:00 AM
                            </option>

                            <option value="11:00">
                                11:00 AM
                            </option>

                            <option value="13:00">
                                1:00 PM
                            </option>

                            <option value="14:00">
                                2:00 PM
                            </option>

                            <option value="15:00">
                                3:00 PM
                            </option>

                            <option value="16:00">
                                4:00 PM
                            </option>

                        </select>

                    </div>


                    <div class="appointment-form-group">

                        <label for="service">
                            SERVICE
                        </label>

                        <select
                            id="service"
                            name="service"
                            required
                        >

                            <option value="Check-up">
                                Check-up
                            </option>

                            <option value="Vaccination">
                                Vaccination
                            </option>

                            <option value="Deworming">
                                Deworming
                            </option>

                            <option value="Dental Cleaning">
                                Dental Cleaning
                            </option>

                            <option value="Wound Dressing">
                                Wound Dressing
                            </option>

                            <option value="Consultation">
                                Consultation
                            </option>

                        </select>

                    </div>

                </div>


                <!-- VETERINARIAN -->

                <div class="appointment-form-group full-width">

                    <label for="veterinarian">
                        VETERINARIAN
                    </label>

                    <select
                        id="veterinarian"
                        name="veterinarian"
                    >

                        <option value="Dr. Reyes">
                            Dr. Reyes
                        </option>

                        <option value="Dr. Aquino">
                            Dr. Aquino
                        </option>

                    </select>

                </div>


                <!-- DATE -->

                <input
                    type="hidden"
                    name="appointment_date"
                    value="{{ now()->format('Y-m-d') }}"
                >


                <!-- BUTTONS -->

                <div class="appointment-form-actions">

                    <button
                        type="button"
                        class="appointment-cancel-btn"
                        id="appointmentCancelBtn"
                    >
                        Cancel
                    </button>


                    <button
                        type="submit"
                        class="appointment-save-btn"
                    >
                        Save Appointment
                    </button>

                </div>

            </form>

        </div>

    </div>



    <!-- =====================================================
         LOGOUT CONFIRMATION
    ====================================================== -->

    <div
        class="logout-modal"
        id="logoutModal"
    >

        <div class="logout-modal-content">

            <div class="logout-icon">
                ⏻
            </div>


            <h2>
                Are you sure?
            </h2>


            <p>
                Are you sure you want to log out?
            </p>


            <div class="logout-modal-actions">

                <button
                    type="button"
                    class="logout-cancel-btn"
                    id="logoutCancelBtn"
                >
                    Cancel
                </button>


                <form
                    method="POST"
                    action="{{ route('logout') }}"
                    style="margin: 0;"
                >

                    @csrf

                    <button
                        type="submit"
                        class="logout-confirm-btn"
                    >
                        Log out
                    </button>

                </form>

            </div>

        </div>

    </div>



    <!-- =====================================================
         APPOINTMENT FILTER SCRIPT
    ====================================================== -->

    <script>

        document.addEventListener('DOMContentLoaded', function () {

            const tabs = document.querySelectorAll(
                '.appointment-tabs .appointment-tab'
            );

            const tableBody =
                document.getElementById('appointmentTableBody');

            const search =
                document.getElementById('appointmentSearch');


            function filterAppointments(status) {

                if (!tableBody) {
                    return;
                }

                const rows =
                    tableBody.querySelectorAll('tr');

                const searchValue = search
                    ? search.value.toLowerCase().trim()
                    : '';


                rows.forEach(function (row) {

                    const rowStatus =
                        (row.getAttribute('data-status') || '')
                        .toLowerCase();

                    const rowText =
                        row.textContent.toLowerCase();

                    const matchesStatus =
                        status === 'all' ||
                        rowStatus === status;

                    const matchesSearch =
                        rowText.includes(searchValue);

                    row.style.display =
                        matchesStatus && matchesSearch
                            ? ''
                            : 'none';

                });

            }


            tabs.forEach(function (tab) {

                tab.addEventListener('click', function () {

                    tabs.forEach(function (item) {
                        item.classList.remove('active');
                    });

                    this.classList.add('active');

                    const status =
                        this.getAttribute('data-status');

                    filterAppointments(status);

                });

            });


            if (search) {

                search.addEventListener('input', function () {

                    const activeTab =
                        document.querySelector(
                            '.appointment-tabs .appointment-tab.active'
                        );

                    const status =
                        activeTab
                            ? activeTab.getAttribute('data-status')
                            : 'all';

                    filterAppointments(status);

                });

            }


            /* =================================================
               APPOINTMENT MODAL
            ================================================= */

            const addAppointmentBtn =
                document.getElementById('addAppointmentBtn');

            const closeModal =
                document.getElementById('closeModal');

            const appointmentCancelBtn =
                document.getElementById('appointmentCancelBtn');

            const appointmentModal =
                document.getElementById('appointmentModal');


            if (addAppointmentBtn && appointmentModal) {

                addAppointmentBtn.addEventListener('click', function () {

                    appointmentModal.classList.add('show');

                });

            }


            if (closeModal && appointmentModal) {

                closeModal.addEventListener('click', function () {

                    appointmentModal.classList.remove('show');

                });

            }


            if (appointmentCancelBtn && appointmentModal) {

                appointmentCancelBtn.addEventListener('click', function () {

                    appointmentModal.classList.remove('show');

                });

            }


            if (appointmentModal) {

                appointmentModal.addEventListener('click', function (event) {

                    if (event.target === appointmentModal) {

                        appointmentModal.classList.remove('show');

                    }

                });

            }


            /* =================================================
               LOGOUT
            ================================================= */

            const logoutModal =
                document.getElementById('logoutModal');

            const logoutCancelBtn =
                document.getElementById('logoutCancelBtn');

            const logoutPowerBtn =
                document.getElementById('logoutPowerBtn');

            const topSignoutBtn =
                document.getElementById('topSignoutBtn');


            if (logoutPowerBtn && logoutModal) {

                logoutPowerBtn.addEventListener('click', function () {

                    logoutModal.classList.add('show');

                });

            }


            if (topSignoutBtn && logoutModal) {

                topSignoutBtn.addEventListener('click', function () {

                    logoutModal.classList.add('show');

                });

            }


            if (logoutCancelBtn && logoutModal) {

                logoutCancelBtn.addEventListener('click', function () {

                    logoutModal.classList.remove('show');

                });

            }


            if (logoutModal) {

                logoutModal.addEventListener('click', function (event) {

                    if (event.target === logoutModal) {

                        logoutModal.classList.remove('show');

                    }

                });

            }

        });

    </script>


</body>

</html>