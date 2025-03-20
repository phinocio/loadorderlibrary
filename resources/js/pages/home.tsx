import { Card, CardContent, CardDescription, CardHeader, CardTitle } from '@/components/ui/card';
import { type SharedData } from '@/types';
import { Head, Link, usePage } from '@inertiajs/react';

interface LoadOrder {
    id: number;
    name: string;
    description: string;
    slug: string;
    author: {
        name: string;
    };
    game: {
        name: string;
    };
}

interface Props {
    latestLoadOrders: LoadOrder[];
}

export default function Home() {
    const { auth, latestLoadOrders } = usePage<SharedData & Props>().props;

    return (
        <>
            <Head title="Home">
                <link rel="preconnect" href="https://fonts.bunny.net" />
                <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
            </Head>
            <div className="bg-background min-h-screen p-6">
                <header className="mb-6 flex w-full justify-between">
                    <h1 className="text-2xl font-semibold">Load Order Library</h1>
                    <nav className="flex items-center gap-4">
                        {auth.user ? (
                            <Link href={route('dashboard')} className="border-border hover:bg-muted rounded-sm border px-5 py-1.5 text-sm">
                                Dashboard
                            </Link>
                        ) : (
                            <>
                                <Link href={route('login')} className="hover:bg-muted rounded-sm px-5 py-1.5 text-sm">
                                    Log in
                                </Link>
                                <Link href={route('register')} className="border-border hover:bg-muted rounded-sm border px-5 py-1.5 text-sm">
                                    Register
                                </Link>
                            </>
                        )}
                    </nav>
                </header>

                <main className="mx-auto max-w-4xl">
                    <section>
                        <h2 className="mb-4 text-xl font-semibold">Latest Load Orders</h2>
                        <div className="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                            {latestLoadOrders.map((loadOrder) => (
                                <Link key={loadOrder.id} href="#">
                                    <Card className="hover:bg-muted/50 h-full transition-colors">
                                        <CardHeader>
                                            <CardTitle>{loadOrder.name}</CardTitle>
                                            <CardDescription>
                                                {loadOrder.game.name} • by {loadOrder.author?.name || 'Anonymous'}
                                            </CardDescription>
                                        </CardHeader>
                                        <CardContent>
                                            <p className="text-muted-foreground text-sm">{loadOrder.description}</p>
                                        </CardContent>
                                    </Card>
                                </Link>
                            ))}
                        </div>
                    </section>
                </main>
            </div>
        </>
    );
}
