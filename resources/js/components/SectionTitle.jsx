import React from 'react';

export default function SectionTitle({ title, link }) {
    if (!title) {
        return (null);
    }

    return (
        <div
            className="px-10 py-4 mb-4 bg-custom-primary-1 shadow rounded-lg border-b-2 border-custom-neutral-1"
        >
            <p
                className="flex font-bold text-lg text-custom-neutral-1"
            >
                {title}
                {link && (
                    <span
                        className="ml-auto"
                    >
                        <a
                            className="text-custom-accent hover:opacity-80"
                            href={link}
                            target="_blank"
                        >
                            {link}
                        </a>
                    </span>
                )}
            </p>
        </div>
    );
}