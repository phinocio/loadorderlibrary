import AppLogoIcon from './app-logo-icon';

export default function AppLogo() {
    return (
        <>
            <div className="text-sidebar-primary-foreground flex aspect-square size-8 items-center justify-center rounded-md">
                <AppLogoIcon className="size-7 text-white dark:text-black" />
            </div>
            <div className="ml-1 grid flex-1 text-left text-sm">
                <span className="mb-0.5 truncate leading-none font-semibold">Load Order Library</span>
            </div>
        </>
    );
}
