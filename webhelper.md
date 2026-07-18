# Phan Mee Eain Learning Hub — Webapp Help Reference

This document is a structured knowledge source used by the the Great Guru AI assistant to answer user questions about how to use the Phan Mee Eain Learning Hub web application.

---

## What is Phan Mee Eain Learning Hub?

Phan Mee Eain Learning Hub is a community learning platform where authors publish educational content and users engage with it through reactions, comments, saves, and reports. The platform supports English, Burmese, and bilingual content.

---

## Roles

The platform has three roles:

- User: Can browse, react, comment, save, report content, and request promotion to author.
- Author (spelled "auther" in the system): Can create, edit, and delete their own content. Has a dedicated author room.
- Admin: Manages users, authors, categories, reports, suggestions, and promotion requests.

---

## Registration and Login

To create an account:
1. Click the Register link on the login page.
2. Fill in your name, email, and password.
3. Submit the form.
4. Log in with your email and password.

After logging in, you are redirected to the user home dashboard.

---

## User Role — What Users Can Do

### Browsing Content

- The user home page shows the content feed.
- Click any content card to open the content page.
- Content includes articles, video links, and downloadable resources.

### Reactions

On any content page, users can react with:
- Like (thumbs up)
- Love (heart)
- Unlike (thumbs down)

Click the reaction button below the content. Your current reaction is highlighted.

### Comments

- Type a comment in the comment box below the content.
- Submit to post.
- You can delete your own comments.
- Authors see unseen comments in their author room.

### Saving Content

- Click the bookmark/save icon on a content card or content page.
- Saved content toggles: clicking again removes it from saved.
- Your saved content is accessible from your profile or dashboard.

### Reporting Content

- Click the Report button on the content page.
- A modal dialog opens. Select a reason from the list:
  - Wrong Information
  - Outdated Information
  - Missing Context
  - Unclear Explanation
  - Duplicate Content
  - Harassment or Bullying
  - Spam
- Submit the report.
- You can only report the same content once per 24 hours. After reporting, a cooldown applies until the next day.
- Admins review all reports.

### Suggestions

- Go to Layout > Suggestion from the navigation.
- Write a suggestion. Minimum length is 50 characters.
- Submit. Admins review all suggestions.

### Profile Management

Go to Layout > Edit Profile to:
- Change your name (6–30 characters)
- Change your email
- Add or update phone number
- Add or update address
- Update your bio/status
- Upload a profile photo (PNG, JPG, JPEG, SVG)

Go to Layout > Change Password to:
- Enter your current password
- Enter a new password (6–12 characters)
- Confirm the new password

### Requesting Author Promotion

To become an author, go to Layout > Promote:
1. Read the four commitment checkboxes carefully.
2. Check all four boxes to confirm you agree.
3. Submit your request.
4. Admins review promotion requests and approve or reject them.
5. You can only submit one promotion request. If you have already submitted, you will see a message that your request is pending.

If approved, your role changes to Author and you gain access to the Author Room.

---

## Author Role — What Authors Can Do

Authors access their tools via the Author Room shortcut in the navigation (Layout > Auther Room).

### Author Room (Dashboard)

Shows:
- Your published content list
- Unseen comments on your content

### Content List

Go to Auther > Content to see all your published posts with pagination.

### Creating Content

Go to Auther > Create Content:
1. Fill in the title (required).
2. Choose a category (required).
3. Select the content role/type (required).
4. Write the main content body (required).
5. Optionally add a featured image (PNG, JPG, JPEG, WEBP, GIF).
6. Optionally add an external video link (must be a valid URL).
7. Optionally upload resource attachments (PDF, Word, PowerPoint, Excel, images, video, ZIP). Maximum total attachment size is 10 MB.
8. Submit. The content appears in your content list and the public feed.

### Editing Content

Go to Auther > Edit Content for the post you want to change:
- All fields can be updated.
- Upload a new image to replace the existing one.
- Add new resource attachments.
- Submit to save changes.

### Deleting Content

In your content list, use the delete action on any post. All attachments are also deleted.

### Viewing Comments (Comment Inbox)

Go to Auther > Comment to see comments on your content, ordered by newest first.
Click "Mark all as seen" to clear the unseen indicator.

### Author Content Rules

Authors must follow these rules (from the Author Status Rules and Regulations):

1. Content must be well-documented with reasonable arguments or factual evidence. Add references and citations where applicable.
2. Content must aim to educate, inform, and add value to the community.
3. No discrimination of any kind (race, gender, religion). No political content. No profanity or slang.
4. Only English, Burmese, or a combination of both are accepted. Other languages may be added in future versions.
5. Admin can revoke author status at any time if there is a valid reason. The admin's decision is final.

---

## Admin Role — What Admins Can Do

Admins access the admin panel at /admins/page.

### User Management

- View all registered users at Admins > All Users.
- Promote a user to author status from the Promotion Requests page.
- Demote an author back to user.
- Delete a user account.

### Author Management

- View all authors at Admins > All Authors.

### Reports

- View submitted content reports at Admins > User Reports.
- Click Mark All as Seen to acknowledge reports.
- View the reported content detail from the report list.

### Suggestions

- View submitted suggestions at Admins > User Suggestions.
- Click Mark All as Seen to acknowledge suggestions.

### Promotion Requests

- View promotion requests at Admins > Promotion Requests.
- Approve (promote user to author) or reject each request.

### Category Management

- Go to Category > Category Page to view, create, or delete content categories.

### Admin View Modes

Admins can switch to a read-only Author view to browse the site as an author would see it.
- Click Switch View Mode in the admin panel to enter author-readonly mode.
- In this mode, all write actions are blocked except AI chat.
- Click Reset View Mode to return to normal admin mode.

### Admin Profile

- Admins have a dedicated profile page at /profile/show.

---

## Content Types

Each piece of content has a role/type set by the author:
- Article: Written educational content.
- Video: Content with an embedded video link.
- Quiz: Interactive quiz content (in development).

---

## Downloading Resources

If an author attached downloadable files to a post, a Download Resources section appears on the content page.
Click the file name to download. Supported formats include PDF, Word, PowerPoint, Excel, images, video, and ZIP.

---

## Governing Policies

### Report Policy

Content is reported for specific reasons. Reports are reviewed by admins. False or malicious reports are subject to admin action. The same content can only be reported once per 24 hours per user.

### Author Guidelines

Authors are responsible for the accuracy and quality of their content. The platform is learning-focused. Content that violates the platform rules may be removed and author status may be revoked.

---

## Common Questions and Answers

Q: How do I become an author?
A: Go to Layout > Promote. Read and check all four commitment checkboxes. Submit. Wait for admin approval.

Q: How do I report a post?
A: Open the content page. Click the Report button. Choose a reason from the list. Submit. You can report the same post again after 24 hours.

Q: How do I save a post?
A: Click the bookmark/save icon on the content. Click again to unsave.

Q: How do I delete my comment?
A: Find your comment on the content page. Click the delete button next to it.

Q: Can I edit my profile?
A: Yes. Go to Layout > Edit Profile. Update your details and save.

Q: How do I change my password?
A: Go to Layout > Change Password. Enter your current password, then your new password twice.

Q: Where is my saved content?
A: Saved content can be found in your user profile or dashboard area.

Q: Why can't I submit a promotion request?
A: You may have already submitted a request. Each user can submit one promotion request. Wait for admin review.

Q: My report was rejected. Why?
A: Admins review all reports and make decisions based on the platform rules. The admin decision is final.

Q: What languages can content be written in?
A: English, Burmese, or a bilingual combination of both.

Q: How long does my suggestion need to be?
A: At least 50 characters.

Q: What file types can authors attach?
A: PNG, JPG, JPEG, WEBP, GIF, MP4, MOV, AVI, MKV, PDF, DOC, DOCX, PPT, PPTX, XLS, XLSX, TXT, ZIP. Maximum total size is 10 MB.

Q: I am logged in as admin. How do I see what the site looks like for a regular user or author?
A: Use the Switch View Mode option in the admin panel to enter author-readonly browsing mode.
