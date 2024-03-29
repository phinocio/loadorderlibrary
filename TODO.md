# TODO file no longer maintained. Check projects tab on Github.

# Load Order Library TODO

A list of things to do, ordered by priority.

<!-- TOC depthfrom:1 depthto:2 -->

- [**In Progress**](#in-progress)
	- [**QOL Improvements For List Comparison Results**](#qol-improvements-for-list-comparison-results)
	- [**Re-Write To Be More API Driven**](#re-write-to-be-more-api-driven)
- [**Future**](#future)
	- [**Better Filtering of Lists v2**](#better-filtering-of-lists-v2)
	- [**Feature Parity for Anonymous Lists ish**](#feature-parity-for-anonymous-lists-ish)
	- [**Compare List From Its Page**](#compare-list-from-its-page)
	- [**Password Recovery Forgot Password**](#password-recovery-forgot-password)
	- [**Implement 2FA**](#implement-2fa)
	- [**Verified Users/Lists**](#verified-userslists)
	- [**Add More Supported Games**](#add-more-supported-games)
- [**Completed**](#completed)
	- [**Account Deletion**](#account-deletion)
	- [**Implement Admin Page**](#implement-admin-page)
	- [**Better Filtering Of Lists**](#better-filtering-of-lists)
	- [**Pagination For Browse Lists Page**](#pagination-for-browse-lists-page)
	- [**More Robust Solution To Line Endings**](#more-robust-solution-to-line-endings)
	- [**Downloading Of List Files**](#downloading-of-list-files)
	- [**Parse File Names On Upload**](#parse-file-names-on-upload)
	- [**Editing Lists**](#editing-lists)
	- [**Delete Files From Disk**](#delete-files-from-disk)
	- [**List Search By Game/Author**](#list-search-by-gameauthor)

<!-- /TOC -->

# **In Progress**

## **QOL Improvements For List Comparison Results**

Things like

- Being able to download a file from the compared to list
- Better layout of results, similar to that of actual diff programs

## **Re-Write To Be More API Driven**

Re-write the entire back-end to be an API separate from the front-end. Making it much easier to interface with other tools such as [Azura's Star](https://github.com/RingComics/azuras-star). This task will be going on in parallel to others in this document.

---

# **Future**

## **Better Filtering of Lists v2**

The previous better filter was mostly for files in a list. This task is for what is basically a search function, which the site is sorely lacking<sup>1</sup>. A search list page will be made that will allow for a variety of search filters such as

- Author
- Date Range
- Game
- Files in the list

A simpler search may be implemented in the mean-time while I work on this.

<sup>1</sup> A work around atm would be to go to the compare lists page and use the filter there to search for a list.

## **Feature Parity for Anonymous Lists (ish)**

The intention of this TODO is to implement a method by which "owners" of Anonymous lists can update/delete/claim a list. The implementation will use a unique ID that only Anonymous lists are associated with and which is only presented once to the user (on list creation). Said UUID will be stored in LocalStorage and enable buttons like "edit", "delete", and "claim". 

The "claim" button will allow a logged in user to claim a list by sending a POST request with the UUID in the body. This will then update the list to be associated with the logged in account. 

## **Compare List From Its Page**

Implement a method of starting a list compare from a specific list's page, without having to first go to the list compare page explicitly. Likely by pre-populating a `/compare/list1` route with a page then asking to select a second list to compare against.

## **Password Recovery (Forgot Password)**

Find a cheap enough mail provider to be able to then make use of Laravel's built-in password reset flow.

## **Implement 2FA**

Self-explanatory.

## **Verified Users/Lists**

For example, Dylan Perry (creator of Ultimate Skyrim) could have an account verified and upload an official Ultimate Skyrim for people to compare against with confidence. Verified users will have a checkmark similar to Twitter. Official lists (which will be determined as such on upload by a verified user) will have a badge indicating it's an official list. The idea is to help users be confident that the list they're comparing against in the compare tool is the actual list as it's meant to be.

## **Add More Supported Games**

Mod Organizer recently updated and added support for more games. Add those as options for lists, to be more in-line with MO2.

---

# **Completed**

## **Account Deletion**

> Completed 2021-02-24

Created a method of deleting accounts and lists associated with those accounts. Account recovery is not possible.

## **Implement Admin Page**
> Completed 2021-02-25

Added an admin only page that shows some minor stats such as

-   Total number of anonymous lists
-   Total number of lists with exact same name uploaded within say, ~5m of each other (to give me a slight idea on if people are having trouble uploading the first time)
-   Total number of registered users (no other info, literally just total number)
-   Total number of lists
-   Total number of files stored on the server and the total size (good to see at a glance for space reasons - server only has 25GB storage)
-   Few other generic numbers I forget I want at the time of writing

## **Better Filtering Of Lists**
> Completed 2021-02-28

Modlist.txt now shows in the "proper" order, the `automatically generated` line is removed for display, separators are supported, and disabled mods in modlist.txt are hidden by default, with a toggle to show them. Also removed the `*` pre-fixing plugins in `plugins.txt`.

## **Pagination For Browse Lists Page**
> Completed 2021-03-02

Pagination for the Browse Lists page shows 15 per page.

## **More Robust Solution To Line Endings**
> Completed 2021-03-05

This was a lot easier than I expected. Fixed regex I was already using, then ran `dos2unix *` command on the files currently uploaded to the site.

## **Downloading Of List Files**
> Completed 2021-03-05

Files now have download buttons for each file, or all in a list. .zip file is stored in a `tmp` directory that is cleared daily. Also added a stat to Admin Stats showing total size of tmp files.

## **Parse File Names On Upload**
> Completed 2021-03-06

Files now are checked against a masterlist of valid filenames on upload. If one is not exact, upload fails. All files are stored as lowercase as, afaik, no games or tools are case sensitive for the files.

## **Editing Lists**
> Completed 2021-03-13

Lists are now editable. You can

- Edit the name of a list (doesn't change the slug)
- Edit the description
- Edit the game a list is for (in case it was wrong on upload or something)
- Add/Edit/Remove files. Editing a file is simply uploading a file with the same name of one already in the list, the one in the list will be removed.

## **Delete Files From Disk**
> Completed 2021-03-15

Once a week a `delete:orphaned` task runs to delete files from the DB and disk that aren't associated with a list.

## **List Search By Game/Author**
> Completed 2021-03-15

Implemented via url query strings. `/lists?game=TESIII Morrowind` will show all Morrowind lists. `/lists?author=Phinocio` will show all lists by Phinocio.