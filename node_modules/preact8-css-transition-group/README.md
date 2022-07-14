# preact8-css-transition-group

> This is a fork of [`preact-css-transition-group`][] that explicitly depends on
> Preact 8 for use in [Uppy][], to address [#2226][], [#2227][] and [#2377][].
>
> You may want to use this in your Preact 8 widgets to prevent interference with
> a Preact X app.
>
> The full list of differences:
> - `preact8-css-transition-group` ships CommonJS only, not UMD
> - `preact8-css-transition-group` only ships unminified code
> - `preact8-css-transition-group` specifies preact `^8.0.0` in its
>    peerDependencies

## Original readme

A preact fork of [css-transition-group](https://github.com/react-component/css-transition-group), which was originally extracted from the React codebase itself. The overwhelming majority of the code was written by the lovely folks of the React team, so kudos to them!

This module may be of use to you if:

- you want to apply CSS transitions when adding or removing elements; or
- you are getting a "not found" error for `react/lib/ReactCSSTransitionGroup`

[`preact-css-transition-group`]: https://github.com/developit/preact-css-transition-group
[Uppy]: https://github.com/transloadit/uppy
[#2226]: https://github.com/transloadit/uppy/issues/2226
[#2227]: https://github.com/transloadit/uppy/pull/2227
[#2377]: https://github.com/transloadit/uppy/issues/2377
