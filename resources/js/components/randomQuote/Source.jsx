import React from 'react';

export default function Source({ source, title }) {
    if (!source) {
        return (null);
    }

    return (
        <div className="text-sm italic mb-4">
            <div>
                <a
                    href={`/quotes/source/${source}`}
                    className="text-custom-accent hover:opacity-80"
                >
                    {title || source}
                </a>
            </div>
        </div>
    );
}